<?php

namespace Korkoshko\BestChange\Transformers;

class RateTransformer extends AbstractTransformer
{
    protected const FROM = 0;
    protected const TO = 1;
    protected const EXCHANGER = 2;
    protected const GIVE = 3;
    protected const RECEIVE = 4;
    protected const RESERVE = 5;

    /**
     * @var array
     */
    protected array $map = [
        self::FROM      => 'from_id',
        self::TO        => 'to_id',
        self::EXCHANGER => 'exchanger_id',
        self::GIVE      => 'give',
        self::RECEIVE   => 'receive',
        self::RESERVE   => 'reserve',
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
            $this->map[self::FROM]      => (int) $data[self::FROM],
            $this->map[self::TO]        => (int) $data[self::TO],
            $this->map[self::EXCHANGER] => (int) $data[self::EXCHANGER],
            $this->map[self::GIVE]      => (float) $data[self::GIVE],
            $this->map[self::RECEIVE]   => (float) $data[self::RECEIVE],
            $this->map[self::RESERVE]   => (float) $data[self::RESERVE],
        ];
    }
}
