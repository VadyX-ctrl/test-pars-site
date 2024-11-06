<?php

declare(strict_types=1);

namespace App\Infrastructure\Queue\Handler;

use App\Message\WriteToCsvMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class WriteToCsvMessageHandler
{
    public function __construct(private string $filePath)
    {
    }

    public function __invoke(WriteToCsvMessage $message): void
    {
        $product = $message->product;

        if (!file_exists(dirname($this->filePath))) {
            mkdir(dirname($this->filePath), 0777, true);
        }

        $file = fopen($this->filePath, 'ab');

        if ($file === false) {
            throw new \RuntimeException('Failed to open file');
        }

        fputcsv($file, $product->jsonSerialize());
        fclose($file);
    }
}
