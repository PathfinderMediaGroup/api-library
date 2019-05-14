<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

class AuthTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $auth = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth('Test');
        $this->assertEquals('Test', $auth->getToken());
    }

    public function testBase64()
    {
        $auth = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth('Test');
        $this->assertEquals(base64_encode('Test'), $auth->getRequestToken());
    }
}
