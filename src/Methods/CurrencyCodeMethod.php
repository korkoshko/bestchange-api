<?php

namespace Korkoshko\BestChange\Methods;

use Korkoshko\BestChange\Contracts\{
    Method,
    Transformer
};
use Korkoshko\BestChange\Transformers\CurrencyCode;

class CurrencyCodeMethod implements Method
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'currencies';
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return 'bm_cycodes.dat';
    }

    /**
     * @return Transformer
     */
    public function getTransformer(): Transformer
    {
        return new CurrencyCode;
    }
}