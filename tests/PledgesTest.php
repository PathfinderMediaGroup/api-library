<?php
/**
 * Created by PhpStorm.
 * User: woeler
 * Date: 10/01/19
 * Time: 16:03.
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
        $handle      = fopen('tests/testToken', 'r');
        $this->token = trim(fread($handle, filesize('tests/testToken')));
        fclose($handle);
        $auth      = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api = new \PathfinderMediaGroup\ApiLibrary\Api\PledgesApi($auth);
    }

    public function testToday()
    {
        $pledges = $this->api->get();
        $this->assertEquals(3, count($pledges));
        $this->assertEquals(3, count($pledges['en']));
        $this->assertEquals(3, count($pledges['de']));
        $this->assertEquals(3, count($pledges['fr']));
    }

    public function testInDays()
    {
        $pledges = $this->api->get(5);
        $this->assertEquals(3, count($pledges));
        $this->assertEquals(3, count($pledges['en']));
        $this->assertEquals(3, count($pledges['de']));
        $this->assertEquals(3, count($pledges['fr']));
    }
}
