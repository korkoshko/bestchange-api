<?php

namespace Korkoshko\BestChange\Contracts;

interface Methods
{
    /**
     * @param string $key
     * @param array  $value
     *
     * @return mixed
     */
    public function setMethod(string $key, array $value): self;

    /**
     * @param string $key
     *
     * @return array
     */
    public function getMethod(string $key): array;

    /**
     * @return array
     */
    public function getMethods(): array;
}
