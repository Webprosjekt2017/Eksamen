<?php
error_reporting(E_ALL);

// Opprett en session på IP hvis det ikke allerede eksisterer
if(!(isset($_SESSION)))
{
    session_start();
    $_SESSION['SESSION_IP'] = $_SERVER['REMOTE_ADDR'];
}
elseif ($_SESSION['SESSION_IP'] != $_SERVER['REMOTE_ADDR'])
{
    session_destroy();
    die("Session Invalid");
}


$WebsiteEnabled = true;
if($WebsiteEnabled) {
    require_once("includes/config.php");

    if (!isset($_GET['page'])) {
        Header("Location: ./main/home/");
        die();
    }

    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'home':
                $pageTitle = "Hjem - Main";
                echo '<!DOCTYPE html';
                echo '<html>';
                require_once("includes/head.html");
                echo '<body>';
                require_once("includes/nav.html");
                require_once("pages/home.html");
                require_once("includes/footer.html");
                break;
        }
    }
}
else
{
    echo "This website is currently disabled.</br>";
}
