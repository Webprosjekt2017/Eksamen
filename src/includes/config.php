<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) header("Location: /");

class Config {
    const
        DB_HOST = 'localhost',
        DB_USER = 'woact',
        DB_PASSWORD = 'password',
        DB_DATABASE = 'woact_explore',
        REQUIRE_DB = true,
        WEBSITE_ONLINE = true;

}