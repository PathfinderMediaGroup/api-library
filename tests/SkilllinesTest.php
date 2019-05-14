<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

class SkilllinesTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\SkilllineApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\SkilllineApi($auth);
    }

    public function testGet()
    {
        $skill = $this->api->get(5);
        $this->assertArrayHasKey('name', $skill);
    }

    public function testGetAll()
    {
        $skills = $this->api->getAll();
        $skill  = $skills[0];
        $this->assertArrayHasKey('name', $skill);
    }
}
