<?php

namespace Korkoshko\BestChange\Methods;

use Korkoshko\BestChange\Transformers\Info;
use Korkoshko\BestChange\Contracts\{
    Method,
    Transformer
};

class InfoMethod implements Method
{
    /**
     * @return string
     */
    public function getFileName(): string
    {
        return 'bm_info.dat';
    }

    /**
     * @return Transformer
     */
    public function getTransformer(): Transformer
    {
        return new Info();
    }
}