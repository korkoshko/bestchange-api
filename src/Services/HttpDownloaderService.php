<?php

namespace Korkoshko\BestChange\Services;

use Korkoshko\BestChange\Interfaces\HttpDownloaderInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\{
    ClientInterface,
    Client as GuzzleClient,
    Exception\GuzzleException
};

class HttpDownloaderService implements HttpDownloaderInterface
{
    /**
     * @var string
     */
    protected string $link = 'http://api.bestchange.ru/info.zip';

    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * HttpDownloader constructor.
     *
     * @param ClientInterface|null $client
     */
    public function __construct(?ClientInterface $client = null)
    {
        $this->client = $client ?? new GuzzleClient();
    }

    /**
     * @param string $link
     *
     * @return $this
     */
    public function setLink(string $link)
    {
        $this->link = $this;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $path
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function download(string $path): ResponseInterface
    {
        return $this->client->get($this->link, [
            'sink' => $path,
        ]);
    }
}
