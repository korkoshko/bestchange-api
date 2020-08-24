<?php

namespace Korkoshko\BestChange\Interfaces;

use Korkoshko\BestChange\Transformers\AbstractTransformer;

interface MethodInterface
{
    /**
     * @return string
     */
    public function getFileName(): string;

    /**
     * @return AbstractTransformer
     */
    public function getTransformer(): AbstractTransformer;
}