<?php

class SkillsTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\SkillApi
     */
    private $api;

    public function setUp()
    {
        $handle      = fopen('tests/testToken', 'r');
        $this->token = trim(fread($handle, filesize('tests/testToken')));
        fclose($handle);
        $auth      = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api = new \PathfinderMediaGroup\ApiLibrary\Api\SkillApi($auth);
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
