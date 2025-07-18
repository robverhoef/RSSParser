<?php

namespace Romeen\RSS\Types;

use DateTime;

final class RSSItem
{
    public string $title = '';

    public string $link = '';

    public string $description = '';

    public ?string $author = null;

    public ?string $category = null;

    public ?string $comments = null;

    public ?RSSEnclosure $enclosure = null;

    public ?string $guid = null;

    public ?DateTime $pubDate = null;

    public ?object $source = null;  // unused, looks like a link url attribute + text node

    public function __constructor(string $title, string $link, string $description)
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }
}
