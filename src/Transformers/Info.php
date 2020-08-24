<?php

namespace Korkoshko\BestChange\Transformers;

use Korkoshko\BestChange\Contracts\Transformer;

class Info extends Transformer
{
    protected const KEY = 0;
    protected const VALUE = 1;

    /**
     * @param string $data
     *
     * @return array
     */
    public function transform(string $data): array
    {
        $data = explode('=', $data);

        return [
            $data[self::KEY] => $data[self::VALUE],
        ];
    }
}
