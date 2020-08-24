<?php

namespace Korkoshko\BestChange\Methods;

use Korkoshko\BestChange\Contracts\{
    Method,
    Transformer
};
use Korkoshko\BestChange\Transformers\Currency;

class CurrencyMethod implements Method
{
    /**
     * @return string
     */
    public function getFileName(): string
    {
        return 'bm_cy.dat';
    }

    /**
     * @return Transformer
     */
    public function getTransformer(): Transformer
    {
        return new Currency();
    }
}