<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

namespace PathfinderMediaGroup\ApiLibrary\Api;

class DevTrackerApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/devtracker';

    /**
     * @param int $limit
     *
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function getRecent(int $limit = 25): array
    {
        $data = $this->makeRequest($this->scopeEndpoint, ['limit' => $limit]);

        return json_decode($data, true) ?? [];
    }
}
