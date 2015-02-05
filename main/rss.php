<?php

$rss = "http://www.reddit.com/r/IndianaUniversity/new/.rss";

$xml = @simplexml_load_file($rss);
if($xml===false)die('Error parse RSS: '.$rss);

foreach($xml->xpath('//item') as $item){
    echo '<h3 style="text-align: center;color: darkcyan;">'.$item->title . '</h3>' . '<br />';
    echo '<p>' . $item->description . '</p>';
    echo '<small style="margin-left:60%;color: darkcyan;">' . $item->pubDate . '</small>';
}