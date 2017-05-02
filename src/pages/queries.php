<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

echo "<pre>";
$db = new ExploreDatabase();

if ($db->getError()) {
    echo nl2br ("Connection to database could not be established\n");
    echo $db->getError();
    die();
} else {
    echo nl2br("Connection to database has been established\n");
}

$arr = Array(
    0 => array(
        "open" => "15",
        "close" => "close_time"
    ),
    1 => array(
        "open" => "16",
        "close" => "close_time"
    ),
    2 => array(
        "open" => "19",
        "close" => "close_time"
    ),
    3 => array(
        "open" => "0",
        "close" => "close_time"
    ),
    4 => array(
        "open" => "34",
        "close" => "close_time"
    ),
    5 => array(
        "open" => "54",
        "close" => "close_time"
    ),

);

foreach ($arr as $k => $v) {
    echo $v['open'];
    echo "<br>";
}