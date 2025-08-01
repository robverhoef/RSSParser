<?php

namespace Romeen\RSS\Types;

use DateTime;

final class RSSItem
{
    /** 
     * @var string $title
     */
    public string $title = '';
    /** 
     * @var string $link
     */
    public string $link = '';

    /** 
     * @var string $description
     */
    public string $description = '';

    /** 
     * @var ?string $author
     */
    public ?string $author = null;

    /** 
     * @var ?string $category
     */
    public ?string $category = null;

    /** 
     * @var ?string $comments
     */
    public ?string $comments = null;

    /** 
     * @var ?RSSEnclosure $enclosure
     */
    public ?RSSEnclosure $enclosure = null;

    /** 
     * @var ?string $guid
     */
    public ?string $guid = null;

    /** 
     * @var ?DateTime $comments
     */
    public ?DateTime $pubDate = null;

    /** 
     * @var ?object $source
     */
    public ?object $source = null;  // unused, looks like a link url attribute + text node

    public function __constructor(string $title, string $link, string $description)
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }
}
