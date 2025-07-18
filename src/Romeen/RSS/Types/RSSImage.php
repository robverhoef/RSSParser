<?php

namespace Romeen\RSS\Types;

final class RSSImage
{
    public string $url;

    public string $title;

    public string $link;

    public ?int $width;

    public ?int $height;

    public ?string $description;

    public function __constructor(string $url, string $title, string $link, int $width = 88, int $height = 31, string $description = '')
    {
        $this->url = $url;
        $this->title = $title;
        $this->link = $link;
        $this->width = $width;
        $this->height = $height;
        $this->description = $description;
    }
}
