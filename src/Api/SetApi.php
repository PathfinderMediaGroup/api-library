<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

namespace PathfinderMediaGroup\ApiLibrary\Api;

class SetApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/sets';

    /**
     * @param int $set_id
     *
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function get(int $set_id): array
    {
        $data = $this->makeRequest($this->scopeEndpoint.'/'.$set_id);

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

    /**
     * @param string $query
     *
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function search(string $query): array
    {
        $data = $this->makeRequest($this->scopeEndpoint.'/search', ['query' => $query]);

        return json_decode($data, true) ?? [];
    }

    /**
     * @param int $eso_set_id
     *
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function getByEsoId(int $eso_set_id): array
    {
        $data = $this->makeRequest($this->scopeEndpoint.'/esoid/'.$eso_set_id);

        return json_decode($data, true) ?? [];
    }
}
