<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) header("Location: /");

class Config {
    const
        DB_HOST = 'hostname',
        DB_USER = 'username',
        DB_PASSWORD = 'password',
        DB_DATABASE = 'database',
        REQUIRE_DB = false,
        WEBSITE_ONLINE = true;


    public function fluffFunction($min, $max) {
        if ($min > $max) {
            return true;
        } else {
            return false;
        }
    }
}