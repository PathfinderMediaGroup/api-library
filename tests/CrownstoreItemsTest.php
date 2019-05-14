<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

class CrownstoreItemsTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\CrownstoreItemApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\CrownstoreItemApi($auth);
    }

    public function testSearch()
    {
        $items = $this->api->search('Frost Cat');
        $this->assertEquals(1, count($items));
        $item = $items[0];
        $this->assertArrayHasKey('name', $item);
        $this->assertArrayHasKey('cost', $item);
        $this->assertArrayHasKey('category', $item);

        $items = $this->api->search('dfsjkgdj3235');
        $this->assertEquals(0, count($items));
    }
}
