<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

define('DATABASE_NAME', 'thumbsup');
define('DATABASE_USER', 'homestead');
define('DATABASE_PASS', 'secret');
define('DATABASE_HOST', 'localhost');

if(isset($_POST['hide']))
{
    $pdo = new PDO('mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST, DATABASE_USER, DATABASE_PASS, array(PDO::ATTR_PERSISTENT => true));
    $stmt = $pdo->prepare("INSERT INTO user_data (article_id, user_registration_data, hide) VALUES (:article_id, :user_registration_data, :hide)");

    $stmt->execute(array(
        ':article_id' => $_POST['value'],
        ':user_registration_data' => $_COOKIE['registered'],
        ':hide' => 1
    ));
}

if(isset($_POST['readit']))
{
    $pdo = new PDO('mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST, DATABASE_USER, DATABASE_PASS, array(PDO::ATTR_PERSISTENT => true));
    $stmt = $pdo->prepare("INSERT INTO user_data (article_id, user_registration_data, readit) VALUES (:article_id, :user_registration_data, :readit)");

    $stmt->execute(array(
        ':article_id' => $_POST['value'],
        ':user_registration_data' => $_COOKIE['registered'],
        ':readit' => 1
    ));
}

if(isset($_POST['favorite']))
{
    $pdo = new PDO('mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST, DATABASE_USER, DATABASE_PASS, array(PDO::ATTR_PERSISTENT => true));
    $stmt = $pdo->prepare("INSERT INTO user_data (article_id, user_registration_data, favorite) VALUES (:article_id, :user_registration_data, :favorite)");

    $stmt->execute(array(
        ':article_id' => $_POST['value'],
        ':user_registration_data' => $_COOKIE['registered'],
        ':favorite' => 1
    ));
}

if(isset($_POST['email']) && $_POST['email'] != '')
{
    insertData($_POST['first_name'], $_POST['last_name'], $_POST['email']);

    // you must set correct domain here except vote.dev
    setcookie('registered', md5($_POST['email']), time()+60*60*24*6004, "/", "vote.dev");
    $_COOKIE['registered'] = md5($_POST['email']);

    if(isset($_COOKIE['registered']))
    {
        header("Location: /news.php");
    } else {
        echo "Cookie is not set...";
    }
}

function insertData($first_name, $last_name, $email)
{
    $pdo = new PDO('mysql:dbname=' . DATABASE_NAME . ';host=' . DATABASE_HOST, DATABASE_USER, DATABASE_PASS, array(PDO::ATTR_PERSISTENT => true));
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");

    $stmt->execute(array(
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email
    ));
}