<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('../includes/config.php');
require_once('../includes/ExploreDatabase.php');
$db = new ExploreDatabase();

if (isset($_POST['delete'])) {
    echo $_POST['delete'];
    $fjerdingen = json_decode(file_get_contents(__DIR__ . '/../assets/fjerdingen.json'), true);
    $brenneriveien = json_decode(file_get_contents(__DIR__ . '/../assets/brenneriveien.json'), true);
    $vulkan = json_decode(file_get_contents(__DIR__ . '/../assets/vulkan.json'), true);

    $tempArr = array();
    $addressKey = strtolower(preg_replace('/\s*/', '', $location['delete']));
    $hasKey = false;
    $campus = "none";
    if (!$hasKey) {
        $hasKey = array_key_exists($addressKey, $fjerdingen);
        $tempArr = $tempArr + $fjerdingen;
        $campus = "fjerdingen";
    } else if (!$hasKey) {
        $hasKey = array_key_exists($addressKey, $brenneriveien);
        $tempArr = $tempArr + $brenneriveien;
        $campus = "brenneriveien";
    } else if (!$hasKey) {
        $hasKey = array_key_exists($addressKey, $vulkan);
        $tempArr = $tempArr + $vulkan;
        $campus = "vulkan";
    } else if (!$hasKey) {
        $_SESSION['err_no'] = 1;
        header("Location: remove-location.php");
        die();
    }

    unset($tempArr[$_POST['delete']]);
    file_put_contents(__DIR__ . '/../assets/' . $campus . '.json', json_encode($tempArr, true));

    /*$db->removeLocation($_POST['delete']);
    $_SESSION['success'] = true;*/
}

//header("Location: remove-location.php");
?>