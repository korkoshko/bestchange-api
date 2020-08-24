<?php

namespace Korkoshko\BestChange\Transformers;

use Korkoshko\BestChange\Contracts\Transformer;

class Currency extends Transformer
{
    protected const ID = 0;
    protected const NAME = 2;
    protected const ANOTHER = 3;

    /**
     * @var array
     */
    protected array $map = [
        self::ID      => 'id',
        self::NAME    => 'name',
        self::ANOTHER => 'another',
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
            $this->map[self::ID]      => (int) $data[self::ID],
            $this->map[self::NAME]    => $data[self::NAME],
            $this->map[self::ANOTHER] => $data[self::ANOTHER],

        ];
    }
}
