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
     * @var ?string $language
     */
    public ?string $language = null;
    /**
     * @var ?string $copyright
     */
    public ?string $copyright = null;
    /**
     * @var ?string $managingEditor email
     */
    public ?string $managingEditor = null;
    /**
     * @var ?string $webMaster email
     */
    public ?string $webMaster = null;
    /**
     * @var ?DateTime $pubDate
     */
    public ?DateTime $pubDate = null;
    /**
     * @var ?DateTime $lastBuildDate
     */
    public ?DateTime $lastBuildDate = null;
    /**
     * @var ?string $category
     */
    public ?string $category = null;
    /**
     * @var ?string $generator
     */
    public ?string $generator = null;
    /**
     * @var ?string $docs url
     */
    public ?string $docs = null;

    // public string $cloud; not implemented yet

    /**
     * @var ?int $ttl
     */
    public ?string $ttl = null; // minutes

    /**
     * @var ?RSSImage $image
     */
    public ?RSSImage $image = null;

    /**
     * @var ?int $rating
     */
    public ?string $rating = null;

    //  public string $textInput; //usued not implemented

    /** 
     * @var int[] $skipHours hours between 0-24
     */
    public ?array $skipHours = null;

    /** 
     * @var ?string[] $skipDays day names 
     */
    public ?array $skipDays;

    /** 
     * @var ?RSSItem[] $item
     */
    public ?array $item = null;

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
    }
}
