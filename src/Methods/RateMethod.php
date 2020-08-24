<?php

namespace Korkoshko\BestChange\Methods;

use Korkoshko\BestChange\Contracts\{
    Method,
    Transformer
};
use Korkoshko\BestChange\Transformers\Rate;

class RateMethod implements Method
{
    /**
     * @return string
     */
    public function getFileName(): string
    {
        return 'bm_rates.dat';
    }

    /**
     * @return Transformer
     */
    public function getTransformer(): Transformer
    {
        return new Rate();
    }
}