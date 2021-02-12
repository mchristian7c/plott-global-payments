<?php

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dotenv->required([
    'GP_MERCHANT_ID',
    'GP_ACCOUNT_ID',
    'GP_SECRET',
    'GP_PAYMENT_URL',
]);

function env(string $variable): ?string
{
    return $_ENV[$variable] ?? null;
}