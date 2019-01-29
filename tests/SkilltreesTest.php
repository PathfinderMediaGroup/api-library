<?php

class SkilltreesTest extends \PHPUnit\Framework\TestCase
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
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\SkilltreeApi($auth);
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
