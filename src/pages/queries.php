<?php
echo "<pre>";
$db = new ExploreDatabase();

if ($db->getError()) {
    echo nl2br ("Connection to database could not be established\n");
    echo $db->getError();
    die();
} else {
    echo nl2br("Connection to database has been established\n");
}


echo "<br><br><br>";

$locations = $db->getAllLocationsData();

print_r($locations);

echo "</pre>";
