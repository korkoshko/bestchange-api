<?php

use Korkoshko\BestChange\BestChange;

require_once __DIR__ . '/../vendor/autoload.php';

$bestChange = new BestChange();
$bestChange->setArchivePath(__DIR__);

if (! file_exists($bestChange->getArchivePath())) {
    $bestChange->download();
}

foreach ($bestChange->getExchangers() as $exchanger) {
    var_dump($exchanger);
}