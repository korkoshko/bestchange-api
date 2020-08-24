<?php

namespace Korkoshko\BestChange\Interfaces;

use Korkoshko\BestChange\Transformers\AbstractTransformer;

interface ZipReaderInterface
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
     * @param string                   $filename
     * @param AbstractTransformer|null $transformer
     *
     * @return array
     */
    public function read(string $filename, ?AbstractTransformer $transformer);
}
