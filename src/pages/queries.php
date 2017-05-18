<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
echo '<pre>';
require_once('includes/config.php');
require_once('includes/ExploreDatabase.php');

if (Config::REQUIRE_DB) {
    $db = new ExploreDatabase();
    if ($db->getError()) {
        echo 'Connection to database could not be established.';
        echo '<br>';
        echo $db->getError();
        die();
    }
}

$fjerdingen = $db->getLocationData("Storgata 45A");

print_r($fjerdingen);
