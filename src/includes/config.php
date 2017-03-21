<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) header("Location: /home/");

$Config = array();

// Database Details
$Config['database'] = array();
$Config['database']['hostname'] = 'localhost';
$Config['database']['username'] = 'username';
$Config['database']['password'] = 'password';
$Config['database']['database'] = 'test';

function getConfig() {
    return "Config Loaded";
}

function fluffFunction($x, $y) {
    if ($x >= $y) {
        return true;
    } else if ($x <= $y) {
        return false;
    }
}