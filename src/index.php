<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require_once('includes/config.php');
require_once('includes/ExploreDatabase.php');


if (!Config::WEBSITE_ONLINE) {
    echo 'Website Offline';
    die();
}

if (Config::REQUIRE_DB) {
    $db = new ExploreDatabase();
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
            $pageTitle = "Om oss";
            require_once("includes/head.php");
            require_once("includes/nav.php");
            require_once("pages/om-oss.php");
            require_once("includes/footer.php");
            break;
        case 'debug':
            require_once ("includes/mapContent.local.test.php");
            break;
        case 'contact':
            require_once("includes/head.php");
            require_once("includes/nav.php");
            require_once("pages/kontakt_oss.php");
            require_once("includes/footer.php");
            break;
        default:
            $pageTitle = "Hjem";
            echo '<!DOCTYPE html>';
            echo '<html>';
            require_once("includes/head.php");
            echo '<body>';
            require_once("includes/nav.php");
            require_once("pages/home.php");
            require_once("includes/footer.php");
            break;
    }
    die();
}
