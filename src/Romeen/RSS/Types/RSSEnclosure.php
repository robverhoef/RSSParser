<?php

namespace Romeen\RSS\Types;

final class RSSEnclosure
{
    /**
     * @var string $url
     */
    public string $url;
    /**
     * @var string $type
     */
    public string $type;
    /**
     * @var int $length
     */
    public int $length;

    /**
     * @param string $url
     * @param string $type mime-type
     * @param int $length file size of media in bytes
     */
    function __construct(string $url, string $type, int $length)
    {
        $this->url = $url;
        $this->type = $type;
        $this->length = $length;
    }
}
