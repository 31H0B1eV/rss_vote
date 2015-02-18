<?php
include_once('db/class.DBPDO.php');

define('DATABASE_NAME', 'thumbsup');
define('DATABASE_USER', 'homestead');
define('DATABASE_PASS', 'secret');
define('DATABASE_HOST', 'localhost');

$rssIndianaUniversity = "http://www.reddit.com/r/IndianaUniversity/new/.rss";
$rssBloomington = "http://www.reddit.com/r/bloomington/new/.rss";
$rssHeraldTimesOnline = "http://www.heraldtimesonline.com/search/?q=&t=article&l=100&d=&d1=&d2=&s=start_time&sd=desc&nsa=eedition&c[]=news/local,news/local/*&f=rss";
$rssMagbloom = "http://www.magbloom.com/feed/";

$data = getData([$rssIndianaUniversity, $rssBloomington, $rssHeraldTimesOnline, $rssMagbloom]);
insertLastData($data);

function insertLastData($data)
{
    $pdo = new PDO('mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST, DATABASE_USER, DATABASE_PASS, array(PDO::ATTR_PERSISTENT => true));
    $stmt = $pdo->prepare("INSERT INTO articles (link, title, description, pubDate) VALUES (:link, :title, :description, :pubDate)");

    foreach($data as $item)
    {
        $date = date("Y-m-d H:i:s", strtotime($item->pubDate));

        $stmt->execute(array(
            ':link' => $item->link,
            ':title' => $item->title,
            ':description' => $item->description,
            ':pubDate' => $date,
        ));
    }
}

function selectData()
{
    $DB = new DBPDO();

    $data = $DB->fetchAll("SELECT link, title, description, pubDate FROM articles ORDER BY pubDate");

    return $data;
}

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