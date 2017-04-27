<?php
require_once 'src/includes/config.php';
class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testFluffFunctionMaxIsLargerThanMin() {
        $config = new Config();
        $this->assertTrue($config->fluffFunction(7, 3));
    }
}