<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

namespace PathfinderMediaGroup\ApiLibrary\Api;

use PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException;

class TrialApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/trials';

    /**
     * @return array
     * @throws FailedPmgRequestException
     */
    public function getTrials(): array
    {
        $data = $this->makeRequest($this->scopeEndpoint);

        return json_decode($data, true) ?? [];
    }

    /**
     * @param int $trialId
     * @return array
     * @throws FailedPmgRequestException
     */
    public function getLeaderboard(int $trialId): array
    {
        $data = $this->makeRequest($this->scopeEndpoint.'/'.$trialId);

        return json_decode($data, true) ?? [];
    }
}
