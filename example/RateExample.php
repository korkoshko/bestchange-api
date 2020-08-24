<?php

use Korkoshko\BestChange\BestChange;
use Korkoshko\BestChange\Methods\RateMethod;

require_once __DIR__ . '/../vendor/autoload.php';

$bestChange = new BestChange();
$bestChange->setArchivePath(__DIR__);

if (! file_exists($bestChange->getArchivePath())) {
    $bestChange->download();
}

$iterator = $bestChange->get(RateMethod::class);

$fromId = 93; // BTC
$toId = 139;  // ETH

$take = 10;

while ($iterator->valid() && $take) {
    $rate = $iterator->current();

    // Direction
    if ($rate['from_id'] === $fromId && $rate['to_id'] === 139) {
        $take--;
        var_dump($rate);
    }

    $iterator->next();
}