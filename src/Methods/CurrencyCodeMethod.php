<?php

namespace Korkoshko\BestChange\Methods;

use Korkoshko\BestChange\{
    Interfaces\MethodInterface,
    Transformers\AbstractTransformer,
    Transformers\CurrencyCodeTransformer
};

class CurrencyCodeMethod implements MethodInterface
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
     * @return AbstractTransformer
     */
    public function getTransformer(): AbstractTransformer
    {
        return new CurrencyCodeTransformer();
    }
}