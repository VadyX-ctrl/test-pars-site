<?php

declare(strict_types=1);

namespace App\Product\Queue\Handler;

use App\Product\Queue\Message\WriteToCsvMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class WriteToCsvMessageHandler
{
    public function __invoke(WriteToCsvMessage $message): void
    {
        $data = $message->data;

        $filePath = dirname(__DIR__, 4) . '/var/data/products.csv';

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }

        $file = fopen($filePath, 'a');

        if ($file === false) {
            throw new \RuntimeException('Не вдалося відкрити файл для запису');
        }

        fputcsv($file, $data);
        fclose($file);
    }
}