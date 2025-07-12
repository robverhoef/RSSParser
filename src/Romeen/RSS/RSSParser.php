<?php

namespace Romeen\RSS;

use DateTime;
use Exception;
use Romeen\RSS\Types\RSSChannel;
use Romeen\RSS\Types\RSSItem;
use Romeen\RSS\Types\RSSImage;
use Romeen\RSS\Types\RSSEnclosure;

use function PHPUnit\Framework\throwException;

final class RSSParser
{
    public string $url;
    public $xml;

    /**
     * Parses RSS2.0 from a file or url. 
     * @param string $file filename or url to parse
     * @return RSSChannel
     * @throws Exception when the error level is fatal
     */
    public function parseFile(string $file): RSSChannel
    {
        libxml_use_internal_errors(true);
        // $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));

        $this->url = $file;
        if (str_starts_with($this->url, 'http') === false && file_exists($this->url) === false) {
            throw new Exception('File not found', 404);
        }
        $this->xml = simplexml_load_file($this->url, "SimpleXMLElement", LIBXML_NOCDATA);
        if (!$this->xml) {
            foreach (libxml_get_errors() as $error) {
                if ($error->level === LIBXML_ERR_FATAL) {
                    throwException(new Exception("{$error->message}\nIn file: {$error->file}\nLine: {$error->line}\n", $error->code));
                }
            }
            libxml_clear_errors();
        }
        return $this->parse();
    }
    /** 
     * Parses RSS2.0 from a string
     * @param string $xmldata
     * @return RSSChannel
     * @throws Exception when the error level is fatal
     */

    public function parseString(string $xmldata): RSSChannel
    {
        libxml_use_internal_errors(true);
        $this->xml = simplexml_load_string($xmldata, "SimpleXMLElement", LIBXML_NOCDATA);
        if (!$this->xml) {
            foreach (libxml_get_errors() as $error) {
                if ($error->level === LIBXML_ERR_FATAL) {
                    throwException(new Exception("{$error->message}\nLine: {$error->line}\n", $error->code));
                }
            }
            libxml_clear_errors();
        }

        return $this->parse();
    }
    private function parse(): RSSChannel
    {
        $c = $this->xml->channel;
        $channel = new RSSChannel($c->title, $c->link, $c->description);
        $channel->title = $c->title;
        $channel->link = $c->link;
        $channel->description = $c->description;
        $channel->language = $c->language;
        $channel->copyright = $c->copyright;
        $channel->managingEditor = $c->managingEditor;
        $channel->webMaster = $c->webMaster;
        $channel->pubDate = $c->pubDate ? new DateTime($c->pubDate) : null;
        $channel->lastBuildDate = $c->lastBuildDate ? new DateTime($c->lastBuildDate) : null;
        $channel->category = $c->category;
        $channel->generator = $c->generator;
        $channel->docs = $c->docs;
        // $channel->cloud = $c->cloud;
        $channel->ttl = intval($c->ttl | '0'); // minutes
        $channel->image = new RSSImage($c->image->url, $c->image->title, $c->image->link, $c->image->width, $c->image->height, $c->image->description);
        $channel->rating = $c->rating ?? '';

        //  public string $textInput; //usued
        $channel->skipHours = $c->skipHours->hour !== null ? array_map(fn($h) => intval($h), $c->skipHours->hour) : [];
        $channel->skipDays = $c->skipDays->day !== null ? array_map(fn($h) => $h, $c->skipDays->day) : [];
        $channel->item = [];
        // loop over items;
        foreach ($c->item as $item) {
            $it = new RSSItem($item->title, $item->link);
            $it->description = $item->description;
            $it->author = $item->author;
            $it->category = $item->category;
            $it->comments = $item->comments;
            $ienc = $item->enclosure;
            $it->enclosure = $ienc['url'] ? new RSSEnclosure($ienc['url'], $ienc['type'], intval($ienc['length'])) : null;
            $channel->item[] = $it;
        }
        return $channel;
    }

    private function display_xml_error($error): string
    {
        $xml = $this->xml;
        $return  = $xml[$error->line - 1] . "\n";
        $return .= str_repeat('-', $error->column) . "^\n";

        switch ($error->level) {
            case LIBXML_ERR_WARNING:
                $return .= "Warning $error->code: ";
                break;
            case LIBXML_ERR_ERROR:
                $return .= "Error $error->code: ";
                break;
            case LIBXML_ERR_FATAL:
                $return .= "Fatal Error $error->code: ";
                break;
        }

        $return .= trim($error->message) .
            "\n  Line: $error->line" .
            "\n  Column: $error->column";

        if ($error->file) {
            $return .= "\n  File: $error->file";
        }

        return "$return\n\n--------------------------------------------\n\n";
    }
}
