<?php

use Korkoshko\BestChange\BestChange;
use Korkoshko\BestChange\Methods\CurrencyCodeMethod;

require_once __DIR__ . '/../vendor/autoload.php';

$bestChange = new BestChange();
$bestChange->setArchivePath(__DIR__);

if (! file_exists($bestChange->getArchivePath())) {
    $bestChange->download();
}

foreach ($bestChange->get(CurrencyCodeMethod::class) as $currency) {
    var_dump($currency);
}