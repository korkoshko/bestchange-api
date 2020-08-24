<?php

namespace Korkoshko\BestChange\Transformers;

use Korkoshko\BestChange\Contracts\Transformer;

class Exchanger extends Transformer
{
    protected const ID = 0;
    protected const NAME = 1;

    /**
     * @var array
     */
    protected array $map = [
        self::ID   => 'id',
        self::NAME => 'name',
    ];

    /**
     * @param string $data
     *
     * @return array
     */
    public function transform(string $data): array
    {
        $data = parent::transform($data);

        return [
            $this->map[self::ID]   => (int) $data[self::ID],
            $this->map[self::NAME] => $data[self::NAME],
        ];
    }
}
