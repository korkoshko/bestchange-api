<?php

namespace Korkoshko\BestChange\Contracts;

/**
 * Class Transformer
 *
 * @package App\Admin\BestChange\Services\Contracts
 */
abstract class Transformer
{
    /**
     * @var string
     */
    protected string $delimiter = ';';

    /**
     * @param string $data
     *
     * @return array
     */
    public function transform(string $data)
    {
        return explode($this->delimiter, $data);
    }
}
