<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

namespace PathfinderMediaGroup\ApiLibrary\Api;

class SkilltreeApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/skilltrees';

    /**
     * @param int $skilltree_id
     *
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function get(int $skilltree_id): array
    {
        $data = $this->makeRequest($this->scopeEndpoint.'/'.$skilltree_id);

        return json_decode($data, true) ?? [];
    }

    /**
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function getAll(): array
    {
        $data = $this->makeRequest($this->scopeEndpoint);

        return json_decode($data, true) ?? [];
    }
}
