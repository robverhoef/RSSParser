# RSSParser

A very basic PHP RSS2.0 parser.

```PHP
use Romeen\RSS\RSSParser;
// use Romeen\RSS\Types\RSSChannel;

// Somewhere in your code...
$parser = new RSSParser;

// this will return a RSSChannel:
$rss = $parser->parseFile('../testdata.xml');

// URL's should work fine too...
$rss = $parser->parseFile('https://YOUR_TARGET/FEED');

// ...or parse an XML string:
$rss = $parser->parseString($xmlstr);


```

See the docs folder for more.
