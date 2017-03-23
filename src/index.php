<?php
error_reporting(E_ALL);

require_once('includes/config.php');
require_once('includes/Database.php');


if (!Config::WEBSITE_ONLINE) {
    echo 'Website Offline';
    die();
}

if (Config::REQUIRE_DB) {
    $db = new Database();
    if ($db->getError()) {
        echo 'Connection to database could not be established.';
        echo '<br>';
        echo $db->getError();
        die();
    }
}

if (isset($_GET["destination"])) {
    switch ($_GET["destination"]) {
        case 'about':
            print_r($_GET["destination"]);
            echo 'body for about loaded';
            break;
        case 'login':
            echo 'body for login loaded';
            break;
        case 'other':
            echo 'body for other loaded';
            break;
        default:
            header("Location: /");
            break;
    }
    die();
}

$pageTitle = "Hjem";
require_once("includes/header.php");
require_once("pages/main.php");
require_once("includes/footer.php");