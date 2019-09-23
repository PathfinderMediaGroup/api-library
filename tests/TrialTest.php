<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

use PHPUnit\Framework\TestCase;

class TrialTest extends TestCase
{
    private $token;

    /**
     * @var \PathfinderMediaGroup\ApiLibrary\Api\TrialApi
     */
    private $api;

    public function setUp()
    {
        $this->token = getenv('BEAST_KEY');
        $auth        = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth($this->token);
        $this->api   = new \PathfinderMediaGroup\ApiLibrary\Api\TrialApi($auth);
    }

    public function testGet()
    {
        $trials = $this->api->getTrials();
        $trial  = array_pop($trials);
        $this->assertArrayHasKey('name', $trial);
    }

    public function testGetLeaderboard()
    {
        $board = $this->api->getLeaderboard(1);
        $rank  = array_pop($board);
        $this->assertArrayHasKey('name', $rank);
        $this->assertArrayHasKey('userid', $rank);
        $this->assertArrayHasKey('rank', $rank);
        $this->assertArrayHasKey('score', $rank);
    }

    public function testGetLeaderboardWithZosId()
    {
        $board = $this->api->getLeaderboard(1000, true);
        $rank  = array_pop($board);
        $this->assertArrayHasKey('name', $rank);
        $this->assertArrayHasKey('userid', $rank);
        $this->assertArrayHasKey('rank', $rank);
        $this->assertArrayHasKey('score', $rank);
    }
}
