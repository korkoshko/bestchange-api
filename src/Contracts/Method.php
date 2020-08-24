<?php

namespace Korkoshko\BestChange\Contracts;

/**
 * Interface Method
 *
 * @package Korkoshko\BestChange\Contracts
 */
interface Method
{
    /**
     * @return string
     */
    public function getFileName(): string;

    /**
     * @return Transformer
     */
    public function getTransformer(): Transformer;
}