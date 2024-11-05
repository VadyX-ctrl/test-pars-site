<?php

namespace App\Infrastructure\Symfony\Command;

use App\Infrastructure\Symfony\Parser\ProductFetcher;
use App\Product\Queue\Message\WriteToCsvMessage;
use App\Product\Storage\ProductStorageInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class ParseProductsCommand extends Command
{
    public const NAME = 'app:parse-products';

    public function __construct(
        private readonly ProductFetcher $productFetcher,
        private readonly ProductStorageInterface $productStorage,
        private readonly MessageBusInterface $bus
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName(self::NAME)
            ->setDescription('Parse products from input URLs')
            ->addArgument(
                'urls',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'List of URLs for parse (add space)'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Pars start.');

        $urls = $input->getArgument('urls');

        foreach ($urls as $url) {
            $output->writeln("Парсинг URL: $url");
            $products = $this->productFetcher->fetchProducts($url);

            foreach ($products as $product) {
                try {
                    $this->productStorage->insert($product);
                    $this->bus->dispatch(
                        new WriteToCsvMessage(
                            [
                                $product->name,
                                $product->price,
                                $product->imageLink,
                                $product->productLink
                            ]
                        )
                    );
                } catch (\Throwable $e) {
                    $output->writeln(sprintf('Faild insert product %s : %s', $product->name, $e->getMessage()));
                }
            }
        }

        $output->writeln('Pars finish.');

        return Command::SUCCESS;
    }
}
