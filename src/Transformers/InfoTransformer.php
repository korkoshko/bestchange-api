<?php

namespace Korkoshko\BestChange\Transformers;

class InfoTransformer extends AbstractTransformer
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
        $this->setDelimiter('=');

        $data = parent::transform($data);

        return [
            $data[self::KEY] => $data[self::VALUE],
        ];
    }
}
