<?php

define('DATABASE_NAME', 'thumbsup');
define('DATABASE_USER', 'homestead');
define('DATABASE_PASS', 'secret');
define('DATABASE_HOST', 'localhost');

if($_GET['email'] != '')
{
    insertData($_GET['first_name'], $_GET['last_name'], $_GET['email']);

    // you must set correct domain here except vote.dev
    setcookie('registered', md5($_GET['email']), time()+60*60*24*6004, "/", "vote.dev");
    $_COOKIE['registered'] = md5($_GET['email']);

    if(isset($_COOKIE['registered']))
    {
        header("Location: /news.php");
    } else {
        echo "Cookie is not set...";
    }
} else{
    header("Location: /");
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