<?php

namespace Korkoshko\BestChange;

use Psr\Http\Message\ResponseInterface;

use GuzzleHttp\{
    ClientInterface,
    Client as GuzzleClient,
    Exception\GuzzleException
};

/**
 * Class HttpDownloaderService
 *
 * @package App\Admin\BestChange\Services
 */
class HttpDownloaderService implements Contracts\HttpDownloader
{
    /**
     * @var string
     */
    protected string $link;

    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * HttpDownloader constructor.
     *
     * @param string $link
     */
    public function __construct(string $link = 'http://api.bestchange.ru/info.zip')
    {
        $this->client = new GuzzleClient();
        $this->link = $link;
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
