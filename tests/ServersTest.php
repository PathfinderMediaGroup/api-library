<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

class ServersTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\ServersApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\ServersApi($auth);
    }

    public function testGetAll()
    {
        $servers = $this->api->getAll();
        $this->assertEquals(7, count($servers));
    }

    public function testGetSpecific()
    {
        $state = $this->api->getStatusFor(\PathfinderMediaGroup\ApiLibrary\Api\ServersApi::PLATFORM_PC, \PathfinderMediaGroup\ApiLibrary\Api\ServersApi::REGION_EU);
        $this->assertIsBool($state);

        $state = $this->api->getStatusFor('Bla', 'Bla');
        $this->assertFalse($state);
    }
}
