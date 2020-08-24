<?php

namespace Korkoshko\BestChange\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface HttpDownloaderInterface
{
    /**
     * @param string $path
     *
     * @return ResponseInterface
     */
    public function download(string $path): ResponseInterface;
}
