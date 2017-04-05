<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) header("Location: /");

class Config {
    const
        DB_HOST = 'localhost',
        DB_USER = 'woact',
        DB_PASSWORD = 'password',
        DB_DATABASE = 'woact_explore',
        REQUIRE_DB = false,
        WEBSITE_ONLINE = true;


    public function fluffFunction($min, $max) {
        if ($min > $max) {
            return true;
        }

        return false;
    }
}