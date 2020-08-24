<?php

namespace Korkoshko\BestChange;

use Generator;
use ZipArchive;
use Korkoshko\BestChange\Contracts\{
    Transformer,
    ReaderFromZip
};

class ReaderFromZipService implements ReaderFromZip
{
    /**
     * @var ZipArchive
     */
    protected ZipArchive $archive;

    /**
     * @var string|null
     */
    protected ?string $path;

    /**
     * @var bool
     */
    private bool $isOpen = false;

    /**
     * ParseFromZipService constructor.
     *
     * @param string|null $path
     */
    public function __construct(?string $path = null)
    {
        $this->path = $path;
        $this->archive = new ZipArchive();
    }

    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @return $this
     */
    public function open(): self
    {
        $this->isOpen = $this->archive->open($this->path);

        if (! $this->archive->numFiles) {
            throw new \RuntimeException('Archive is empty');
        }

        return $this;
    }

    /**
     * @param string           $filename
     * @param Transformer|null $transformer
     *
     * @return Generator
     */
    public function read(string $filename, ?Transformer $transformer)
    {
        if (! $this->isOpen) {
            $this->open();
        }

        if (! ($stream = $this->archive->getStream($filename))) {
            throw new \RuntimeException('Could not open file ' . $filename . ' in archive: ' . $this->path);
        }

        while (! feof($stream)) {
            $item = $this->encode(fgets($stream));
            yield $transformer ? $transformer->transform($item) : $item;

        }

        fclose($stream);
    }

    public function chunk(Generator $generator, int $size)
    {
        $array = [];
        $counter = 0;

        foreach ($generator as $item) {
            $array[$counter++] = $item;

            if ($counter > $size) {
                yield $array;

                $array = [];
                $counter = 0;
            }
        }

        yield $array;
    }

    /**
     * @return $this
     */
    public function close(): self
    {
        $this->isOpen = ! $this->archive->close();
        return $this;
    }

    /***
     * @param string $content
     * @param string $from
     * @param string $to
     *
     * @return mixed
     */
    private function encode(string $content, string $from = 'cp1251', string $to = 'utf8'): string
    {
        return iconv($from, $to, trim($content));
    }

    /**
     * Close zip archive and delete (if it is tmp)
     */
    public function __destruct()
    {
        if ($this->isOpen) {
            $this->close();
        }

        if (sys_get_temp_dir() === dirname($this->path) && file_exists($this->path)) {
            unlink($this->path);
        }
    }
}
