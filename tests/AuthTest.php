<?php

class AuthTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $auth = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth('Test');
        $this->assertEquals('Test', $auth->getToken());
    }

    public function testBase64()
    {
        $auth = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth('Test');
        $this->assertEquals(base64_encode('Test'), $auth->getRequestToken());
    }
}
