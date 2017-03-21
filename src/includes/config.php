<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) header("Location: /home/");

class Config {
    static $DB_HOST         = 'localhost';
    static $DB_DATABASE     = 'database';
    static $DB_USERNAME     = 'username';
    static $DB_PASSWORD     = 'password';


    public function fluffFunction($min, $max) {
        if ($min > $max) {
            return true;
        } else {
            return false;
        }
    }
}