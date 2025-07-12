<?php


namespace Romeen\RSS\Types;

use DateTime;
use Romeen\RSS\Types\RSSEnclosure;

final class RSSItem
{
    /**
     * @var string 
     */
    public string $title;
    /**
     * @var string $link
     */
    public string $link;
    /**
     * @var string $description
     */
    public string $description;
    /**
     * @var string $author
     */
    public string $author;
    /**
     * @var string $category
     */
    public string $category;
    /**
     * @var string $comments URL
     */
    public string $comments;
    /**
     * @var RSSEnclosure|null $enclosure
     */
    public RSSEnclosure|null $enclosure;
    /**
     * @var string $guid;
     */
    public string $guid;
    /**
     * @var DateTime $pubDate
     */
    public DateTime $pubDate;
    public object $source;


    /**
     * @param string $title required
     * @param string $link required
     * @param string $description required
     */
    public function __constructor(string $title, string $link, $description)
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }
}
