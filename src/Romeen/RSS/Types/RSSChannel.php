<?php

namespace Romeen\RSS\Types;

use \DateTime;

class RSSChannel
{
    /** 
     * @var string $title
     */
    public string $title;

    /** 
     * @var string $link url
     */
    public string $link;

    /** 
     * @var string $description 
     */
    public string $description;

    /**
     * @var string $language
     */
    public string $language;
    /**
     * @var string $copyright
     */
    public string $copyright;
    /**
     * @var string $managingEditor email
     */
    public string $managingEditor;
    /**
     * @var string $webMaster email
     */
    public string $webMaster;
    /**
     * @var DateTime $pubDate
     */
    public DateTime $pubDate;
    /**
     * @var DateTime $lastBuildDate
     */
    public DateTime $lastBuildDate;
    /**
     * @var string $category
     */
    public string $category;
    /**
     * @var string $generator
     */
    public string $generator;
    /**
     * @var string $docs url
     */
    public string $docs;

    // public string $cloud; not implemented yet

    /**
     * @var int $ttl
     */
    public string $ttl; // minutes

    /**
     * @var RSSImage $image
     */
    public RSSImage $image;

    /**
     * @var int $rating
     */
    public string $rating;

    //  public string $textInput; //usued not implemented

    /** 
     * @var int[] $skipHours hours between 0-24
     */
    public array $skipHours;

    /** 
     * @var string[] $skipDays day names 
     */
    public array $skipDays;

    /** 
     * @var RSSItem[] $item
     */
    public $item; // Note: rss spec defines var name as singular, although plural would be more appropriate.

    /**
     * @param string $title required
     * @param string $link required
     * @param string $description required
     */
    public function __construct(string $title, string $link, string $description)
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->item = [];
    }
}
