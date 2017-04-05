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


$locations = $db->getAllLocations();
print_r($locations);

echo "<br><br><br>";

$multidim =
    $db->getAllLocations();

print_r($multidim);
echo "</pre>";
