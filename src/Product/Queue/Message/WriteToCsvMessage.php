<?php

declare(strict_types=1);

namespace App\Product\Queue\Message;

final readonly class WriteToCsvMessage
{
    public function __construct(public array $data)
    {
    }
}
