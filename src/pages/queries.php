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



$data =($db->getLocationData("Hausmanns gate 19"));

print_r($data);

echo '<br>';
echo '<br>';
echo '<br>';

if (isset($data['hours']['6'])) {
    echo "I exist";
} else {
    echo "I don't";
}
