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


print_r($db->getAllLocationsData());