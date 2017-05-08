<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

echo '<pre>';
$db = new ExploreDatabase();

if ($db->getError()) {
    echo nl2br ("Connection to database could not be established\n");
    echo $db->getError();
    die();
} else {
    echo nl2br("Connection to database has been established\n");
}



$locJson = file_get_contents(__DIR__ . '/../assets/vulkan.json');
print_r($locJson);

echo '<br>';

$locArr = json_decode($locJson, true);
print_r($locArr);

echo '<br>';

$oldAddressKey = "dalevegen834";
$newAddr = "nigga";

$newLoc = array($newAddr => array('x' => $locArr[$oldAddressKey]['x'], 'y' => $locArr[$oldAddressKey]['y']));
print_r($newLoc);

echo '<br>';

unset($locArr[$oldAddressKey]);
print_r($locArr);

echo '<br>';
$newArr = array_replace($locArr, $newLoc);
print_r($newArr);

file_put_contents(__DIR__ . '/../assets/vulkan.json', json_encode($newArr, true));