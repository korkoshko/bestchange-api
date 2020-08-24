<?php

namespace Korkoshko\BestChange;

use Generator;
use Korkoshko\BestChange\{
    Interfaces\MethodInterface,
    Interfaces\ZipReaderInterface,
    Interfaces\HttpDownloaderInterface,
    Services\ZipReaderService,
    Services\HttpDownloaderService,
    Methods\CurrencyMethod,
    Methods\CurrencyCodeMethod,
    Methods\InfoMethod,
    Methods\RateMethod
};
use GuzzleHttp\Exception\{
    GuzzleException,
    InvalidArgumentException
};
use Psr\Http\Message\ResponseInterface;

class BestChange
{
    /**
     * @var string
     */
    protected string $archiveName = 'bestchange.zip';

    /**
     * @var string|null
     */
    protected ?string $archivePath = null;

    /**
     * @var ZipReaderInterface
     */
    protected ZipReaderInterface $reader;

    /**
     * @var HttpDownloaderInterface
     */
    protected HttpDownloaderInterface $downloader;

    /**
     * @param ZipReaderInterface|null      $reader
     * @param HttpDownloaderInterface|null $downloader
     */
    public function __construct(
        ZipReaderInterface $reader = null,
        HttpDownloaderInterface $downloader = null
    )
    {
        $this->reader = $reader ?? new ZipReaderService();
        $this->downloader = $downloader ?? new HttpDownloaderService();
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setArchiveName(string $name)
    {
        $this->archiveName = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getArchiveName(): string
    {
        return $this->archiveName;
    }

    /**
     * @param string $path
     *
     * @return $this
     */
    public function setArchivePath(string $path): self
    {
        $this->archivePath = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getArchivePath(): string
    {
        return ($this->archivePath ?? sys_get_temp_dir()) . DIRECTORY_SEPARATOR . $this->archiveName;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function download(): ResponseInterface
    {
        return $this->downloader->download($this->getArchivePath());
    }

    /**
     * @param string $method
     * @param int    $chunk
     *
     * @return Generator
     */
    public function get(string $method, int $chunk = 0)
    {
        $method = $this->newMethodInstance($method);

        $this->reader->setPath($this->getArchivePath());

        $generator = $this->reader->read($method->getFileName(), $method->getTransformer());

        if ($chunk) {
            return $this->reader->chunk($generator, $chunk);
        }

        return $generator;
    }

    /**
     * @return Generator
     */
    public function getInfo(): Generator
    {
        return $this->get(InfoMethod::class);
    }

    /**
     * @param int $chunk
     *
     * @return Generator
     */
    public function getCurrencies(int $chunk = 0)
    {
        return $this->get(CurrencyMethod::class, $chunk);
    }

    /**
     * @param int $chunk
     *
     * @return Generator
     */
    public function getCurrencyCodes(int $chunk = 0)
    {
        return $this->get(CurrencyCodeMethod::class, $chunk);
    }

    /**
     * @param int $chunk
     *
     * @return Generator
     */
    public function getExchangers(int $chunk = 0)
    {
        return $this->get(RateMethod::class, $chunk);
    }

    /**
     * @param int $chunk
     *
     * @return Generator
     */
    public function getRates(int $chunk = 0)
    {
        return $this->get(RateMethod::class, $chunk);
    }

    /**
     * @param string $method
     * @param int    $chunk
     *
     * @return array
     */
    public function getArray(string $method, int $chunk = 0)
    {
        $array = [];

        foreach ($this->get($method, $chunk) as $result) {
            $array = array_merge($array, $result);
        }

        return $array;
    }

    /**
     * @param string $class
     *
     * @return MethodInterface
     * @throws InvalidArgumentException
     */
    protected function newMethodInstance(string $class)
    {
        if (($method = new $class) instanceof MethodInterface) {
            return $method;
        }

        throw new \InvalidArgumentException(
            'Called method ' . $class . ' must be implements of ' . Method::class
        );
    }
}
