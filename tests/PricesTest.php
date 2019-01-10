<?php
/**
 * Created by PhpStorm.
 * User: woeler
 * Date: 10/01/19
 * Time: 17:00.
 */
class PricesTest extends \PHPUnit\Framework\TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\PricesApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\PricesApi($auth);
    }

    public function testSearch()
    {
        $items = $this->api->search('grain solvent eu');
        $this->assertEquals(1, count($items));

        $items = $this->api->search('grain solvent');
        $this->assertEquals(2, count($items));

        $items = $this->api->search('skjdgkjdsjn kjsdjnkgd');
        $this->assertEquals(0, count($items));
    }
}
