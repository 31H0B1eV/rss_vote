<?php

$rssIndianaUniversity = "http://www.reddit.com/r/IndianaUniversity/new/.rss";
$rssBloomington = "http://www.reddit.com/r/bloomington/new/.rss";
$rssHeraldTimesOnline = "http://www.heraldtimesonline.com/search/?q=&t=article&l=100&d=&d1=&d2=&s=start_time&sd=desc&nsa=eedition&c[]=news/local,news/local/*&f=rss";
$rssMagbloom = "http://www.magbloom.com/feed/";

/**
 * Get data from rss feed, see example of using in index.php (line 24)
 * if you need add more feed, just add new value into array or arguments
 *
 * @param $data
 * @return array
 */
function getData($data)
{
    $result = array();
    if(is_array($data))
    {
        foreach($data as $item)
        {
            $xml = @simplexml_load_file($item);
            if($xml===false)die('Error parse RSS: ' . $item);

            foreach($xml->xpath('//item') as $data)
            {
                array_push($result, $data);
            }
        }
    }
    return $result;
}

/**
 * This function sort rss data by timestamp
 * using in main/index.php
 *
 * @param $data
 * @return mixed
 */
function sortData($data)
{
    foreach ($data as $node) {
        $timestamps[]    = strtotime($node->pubDate);
    }
    array_multisort($timestamps, SORT_NUMERIC, $data);

    return $data;
}