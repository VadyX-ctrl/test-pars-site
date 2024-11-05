<?php

use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

if (!array_key_exists('APP_ENV', $_SERVER)) {
    $_SERVER['APP_ENV'] = $_ENV['APP_ENV'] ?? null;
}

if (file_exists($dotenvPath = __DIR__ . '/../.env')) {
    (new Dotenv('APP_ENV', 'APP_DEBUG'))->usePutenv(true)->load($dotenvPath);
}

$_SERVER['APP_ENV'] = $_ENV['APP_ENV'] = ($_SERVER['APP_ENV'] ?? $_ENV['APP_ENV'] ?? null) ?: 'dev';
$_SERVER['APP_DEBUG'] = $_SERVER['APP_DEBUG'] ?? $_ENV['APP_DEBUG'] ?? 'prod' !== $_SERVER['APP_ENV'];
$_SERVER['APP_DEBUG'] = $_ENV['APP_DEBUG'] = (int)$_SERVER['APP_DEBUG'] || filter_var(
    $_SERVER['APP_DEBUG'],
    FILTER_VALIDATE_BOOLEAN
) ? '1' : '0';
