<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

class SetsTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\SetApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\SetApi($auth);
    }

    public function testGet()
    {
        $set = $this->api->get(20);
        $this->assertArrayHasKey('name', $set);
        $this->assertArrayHasKey('bonus_item_2', $set);
    }

    public function testGetByEsoId()
    {
        $set = $this->api->getByEsoId(40);
        $this->assertArrayHasKey('name', $set);
        $this->assertArrayHasKey('bonus_item_2', $set);
    }

    public function testGetAll()
    {
        $sets = $this->api->getAll();
        $set  = $sets[0];
        $this->assertArrayHasKey('name', $set);
        $this->assertArrayHasKey('bonus_item_2', $set);
    }

    public function testSearch()
    {
        $sets = $this->api->search('Ebon Armory');
        $this->assertEquals(1, count($sets));
        $set = $sets[0];
        $this->assertArrayHasKey('name', $set);
        $this->assertArrayHasKey('bonus_item_2', $set);

        $sets = $this->api->search('dfsjkgdj3235');
        $this->assertEquals(0, count($sets));
    }
}
