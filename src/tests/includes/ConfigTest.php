<?php

require_once 'src/includes/config.php';

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testGetConfigIsLoaded()
    {
        $this->assertEquals("Config Loaded", getConfig());
    }

    public function testFluffFunctionXIsLargerThanY() {
        $this->assertTrue(fluffFunction(7, 3));
    }
}