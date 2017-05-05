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


$campus = "fjerdingen";


$locJson = file_get_contents(__DIR__ . '/../assets/' . $campus . '.json');

$locArr = json_decode($locJson, true);

foreach ($locArr as $key => $val) {
    echo $key . '<br>';
}


if (!array_key_exists("nygate", $locArr)) {
    echo 'nygate didnt exist, so this would of added.';
} else {
    echo 'nygate exists!!!!!';
}


$newArr = array("nygate" => array("x" => 'x_val', "y" => 'y_val'));

$mergedArray = array_replace($locArr, $newArr);



$locJson = json_encode($mergedArray, true);

file_put_contents(__DIR__ . '/../assets/' . $campus . '.json', $locJson);
echo '</pre>';

$campus = strtolower($_POST['campus']);
$strippedAddress = strtolower(preg_replace('/\s*/', '', $_POST['address'];

$locJson = file_get_contents(__DIR__ . '/../assets/' . $campus . '.json');
$locArr = json_decode($locJson, true);

if (array_key_exists($strippedAddress, $locArr)) {
    $_SESSION['err_no'] = 2;
    header("Location: add-location.php");
    die();
}

$locPos = array($strippedAddress => array('x' => $_POST['posX'], 'y' => $_POST['posY']));
$mergedArray = array_replace($locArr, $locPos);
$locJson = json_encode($mergedArray, true);
file_put_contents(__DIR__ . '/../assets/' . $campus - '.json', $locJson);