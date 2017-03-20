<?php

require_once 'src/includes/config.php';

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testFalseIsFalse()
    {
        $this->assertEquals("Config Loaded", getConfig());
    }
}