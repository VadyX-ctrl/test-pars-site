<?php

namespace App\Infrastructure\Symfony\Command;

use App\Parser\ParserInterface;
use App\Product\Queue\Message\WriteToCsvMessage;
use App\Product\Storage\ProductStorageInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(name: 'app:parse-products')]
class ParseProductsCommand extends Command
{
    public function __construct(
        private readonly ParserInterface $parser,
        private readonly ProductStorageInterface $productStorage,
        private readonly MessageBusInterface $bus
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Pars start.');

        $products = $this->parser->fetchProducts();

        foreach ($products as $product) {
            try {
                $this->productStorage->insert($product);
                $this->bus->dispatch(new WriteToCsvMessage($product));
            } catch (\Throwable $e) {
                $output->writeln(sprintf('Faild insert product %s : %s', $product->name, $e->getMessage()));
            }
        }

        $output->writeln('Pars finish.');

        return Command::SUCCESS;
    }
}
