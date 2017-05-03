<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once ('includes/config.php');
require_once ('includes/ExploreDatabase.php');

if (!Config::WEBSITE_ONLINE) {
    echo 'Website Offline';
    die();
}


if (isset($_GET["destination"])) {
    switch ($_GET["destination"]) {
        case 'about':
            $pageTitle = "Om pss";
            require_once("includes/head.php");
            require_once("includes/nav.php");
            require_once("pages/about.php");
            require_once("includes/footer.php");
            break;
        case 'debug':
            require_once ("pages/queries.php");
            break;
        case 'contact':
            $pageTitle = "Kontakt oss";
            require_once("includes/head.php");
            require_once("includes/nav.php");
            require_once("pages/contact.php");
            require_once("includes/footer.php");
            break;
        case 'see_all':
            $pageTitle = "Se Alt";
            require_once("includes/head.php");
            require_once("includes/nav.php");
            require_once("pages/see_all.php");
            require_once("includes/footer.php");
            break;
        case 'map':
            $pageTitle = "Kart";
            echo '<!DOCTYPE html>';
            echo '<html>';
            require_once("includes/head.php");
            echo '<body>';
            require_once("includes/nav.php");
            require_once("pages/home.php");
            require_once("includes/footer.php");
            echo '<script>nav.sel = 1;</script>';
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
            echo '<script>nav.sel = 0;</script>';
            break;
    }
    die();
}
