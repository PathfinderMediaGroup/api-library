<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

class PledgesTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\PledgesApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\PledgesApi($auth);
    }

    public function testToday()
    {
        $pledges = $this->api->get();
        $this->assertEquals(4, count($pledges));
        $this->assertEquals(3, count($pledges['en']));
        $this->assertEquals(3, count($pledges['de']));
        $this->assertEquals(3, count($pledges['fr']));
    }

    public function testInDays()
    {
        $pledges = $this->api->get(5);
        $this->assertEquals(4, count($pledges));
        $this->assertEquals(3, count($pledges['en']));
        $this->assertEquals(3, count($pledges['de']));
        $this->assertEquals(3, count($pledges['fr']));
    }
}
