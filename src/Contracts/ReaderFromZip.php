<?php

namespace Korkoshko\BestChange\Contracts;

/**
 * Interface ReaderFromZip
 *
 * @package Korkoshko\BestChange\Contracts
 */
interface ReaderFromZip
{
    /**
     * @param string $path
     *
     * @return $this
     */
    public function setPath(string $path): self;

    /**
     * @return string|null
     */
    public function getPath(): ?string;

    /**
     * @return $this
     */
    public function open(): self;

    /**
     * @return $this
     */
    public function close(): self;

    /**
     * @param string           $filename
     * @param Transformer|null $transformer
     *
     * @return array
     */
    public function read(string $filename, ?Transformer $transformer);
}
