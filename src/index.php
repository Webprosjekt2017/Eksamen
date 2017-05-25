<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 'on');*/

require_once ('includes/config.php');
require_once ('includes/ExploreDatabase.php');

if (!Config::WEBSITE_ONLINE) {
    echo 'Website Offline';
    die();
}


if (isset($_GET["destination"])) {
    switch ($_GET["destination"]) {
        case 'about':
            $pageTitle = "Om oss";
            require_once("includes/head.php");
            require_once("includes/nav.php");
            require_once("pages/about.php");
            require_once("includes/footer.php");
            break;
        case 'contact':
            $pageTitle = "Kontakt oss";
            require_once("includes/head.php");
            require_once("includes/nav.php");
            require_once("pages/contact.php");
            require_once("includes/footer.php");
            break;
        case 'all':
            $pageTitle = "Vis Alt";
            require_once("includes/head.php");
            require_once("includes/nav.php");
            require_once("pages/see-all.php");
            require_once("includes/footer.php");
            break;
        case 'map':
            $pageTitle = "Kart";
            require_once("includes/head.php");
            echo '<script>nav.sel = 1;</script>';
            require_once("includes/nav.php");
            require_once("pages/home.php");
            require_once("includes/footer.php");
            break;
        default:
            $pageTitle = "Hjem";
            require_once("includes/head.php");
            echo '<script>nav.sel = 0;</script>';
            require_once("includes/nav.php");
            require_once("pages/home.php");
            require_once("includes/footer.php");
            break;
    }
    die();
}
