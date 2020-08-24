<?php

namespace Korkoshko\BestChange\Methods;

use Korkoshko\BestChange\Contracts\{
    Method,
    Transformer
};
use Korkoshko\BestChange\Transformers\Exchanger;

class ExchangerMethod implements Method
{
    /**
     * @return string
     */
    public function getFileName(): string
    {
        return 'bm_exch.dat';
    }

    /**
     * @return Transformer
     */
    public function getTransformer(): Transformer
    {
        return new Exchanger();
    }
}