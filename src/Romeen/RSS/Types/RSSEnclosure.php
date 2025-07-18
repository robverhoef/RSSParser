<?php

namespace Romeen\RSS\Types;

final class RSSEnclosure
{
    public string $url = '';

    public string $type = '';

    public int $length = 0;

    /**
     * @param  string  $url  URL of the media
     * @param  string  $type  mime-type
     * @param  int  $length  file size of media in bytes
     */
    public function __construct(string $url, string $type, int $length)
    {
        $this->url = $url;
        $this->type = $type;
        $this->length = $length;
    }
}
