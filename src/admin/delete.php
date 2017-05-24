<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('../includes/config.php');
require_once('../includes/ExploreDatabase.php');
$db = new ExploreDatabase();

if (isset($_POST['delete'])) {
    list($address, $campus) = explode(":", $_POST['delete'], 2);
    $strippedAddress = strtolower(preg_replace('/\s*/', '', $address));

    $campusJson = file_get_contents(__DIR__ . '/../assets/' . strtolower($campus) . '.json');
    $campusArr = json_decode($campusJson, true);

    unset($campusArr[$strippedAddress]);
    file_put_contents(__DIR__ . '/../assets/' . strtolower($campus) . '.json', json_encode($campusArr, true));

    $db->removeLocation($address);
    $_SESSION['success'] = true;
}

header("Location: remove-location.php");