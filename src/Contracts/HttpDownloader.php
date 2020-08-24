<?php

namespace Korkoshko\BestChange\Contracts;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface HttpDownloader
 *
 * @package App\Admin\BestChange\Services\Contracts
 */
interface HttpDownloader
{
    /**
     * @param string $path
     *
     * @return ResponseInterface
     */
    public function download(string $path): ResponseInterface;
}
