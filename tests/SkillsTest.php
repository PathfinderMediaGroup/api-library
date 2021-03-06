<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

class SkillsTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\SkillApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\SkillApi($auth);
    }

    public function testGet()
    {
        $skill = $this->api->get(20);
        $this->assertArrayHasKey('name', $skill);
        $this->assertArrayHasKey('effect_1', $skill);
        $this->assertArrayHasKey('type', $skill);
    }

    public function testGetAll()
    {
        $skills = $this->api->getAll();
        $skill  = $skills[0];
        $this->assertArrayHasKey('name', $skill);
        $this->assertArrayHasKey('effect_1', $skill);
        $this->assertArrayHasKey('type', $skill);
    }

    public function testSearch()
    {
        $skills = $this->api->search('Empowering Chains');
        $this->assertEquals(1, count($skills));
        $skill = $skills[0];
        $this->assertArrayHasKey('name', $skill);
        $this->assertArrayHasKey('effect_1', $skill);
        $this->assertArrayHasKey('type', $skill);

        $skills = $this->api->search('dfsjkgdj3235');
        $this->assertEquals(0, count($skills));
    }
}
