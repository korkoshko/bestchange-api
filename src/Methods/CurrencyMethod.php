<?php

namespace Korkoshko\BestChange\Methods;

use Korkoshko\BestChange\{
    Interfaces\MethodInterface,
    Transformers\AbstractTransformer,
    Transformers\CurrencyTransformer
};

class CurrencyMethod implements MethodInterface
{
    /**
     * @return string
     */
    public function getFileName(): string
    {
        return 'bm_cy.dat';
    }

    /**
     * @return AbstractTransformer
     */
    public function getTransformer(): AbstractTransformer
    {
        return new CurrencyTransformer();
    }
}