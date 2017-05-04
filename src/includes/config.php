<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) header("Location: /");

class Config {
    const
        DB_HOST = '178.62.193.44',
        DB_USER = 'jeykis16_woact',
        DB_PASSWORD = 'DoraTheDatabaseExplorer12',
        DB_DATABASE = 'jeykis16_woact',
        REQUIRE_DB = true,
        WEBSITE_ONLINE = true;

    public function fluffFunction($min, $max) {
        if ($min > $max) {
            return true;
        }
        return false;
    }
}
