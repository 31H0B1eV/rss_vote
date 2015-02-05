<?php

$rssIndianaUniversity = "http://www.reddit.com/r/IndianaUniversity/new/.rss";
$rssBloomington = "http://www.reddit.com/r/bloomington/new/.rss";
$rssHeraldTimesOnline = "http://www.heraldtimesonline.com/search/?q=&t=article&l=100&d=&d1=&d2=&s=start_time&sd=desc&nsa=eedition&c[]=news/local,news/local/*&f=rss";
$rssMagbloom = "http://www.magbloom.com/feed/";

$xml = @simplexml_load_file($rssIndianaUniversity);
if($xml===false)die('Error parse RSS: '.$rssIndianaUniversity);

foreach($xml->xpath('//item') as $item){
    echo '<h3 style="text-align: center;color: darkcyan;">'.$item->title . '</h3>' . '<br />';
    echo '<p>' . $item->description . '</p>';
    echo '<small style="margin-left:60%;color: darkcyan;">' . $item->pubDate . '</small>';
}