<?php

class DevTrackerTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\DevTrackerApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\DevTrackerApi($auth);
    }

    public function testGet()
    {
        $devtracker = $this->api->getRecent(20);
        $this->assertArrayHasKey('name', $devtracker[0]);
        $this->assertArrayHasKey('author', $devtracker[0]);
        $this->assertArrayHasKey('body', $devtracker[0]);
        $this->assertTrue(count($devtracker) <= 20);
    }
}
