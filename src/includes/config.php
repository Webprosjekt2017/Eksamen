<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) header("Location: /");

/*
Konstanter som inneholder detaljer rundt databasen.
*/

class Config {
    const
        DB_HOST = 'localhost',
        DB_USER = 'root',
        DB_PASSWORD = '',
        DB_DATABASE = 'derp',
        REQUIRE_DB = true,
        WEBSITE_ONLINE = true;
}
