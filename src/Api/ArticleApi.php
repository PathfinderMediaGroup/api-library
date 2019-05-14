<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

namespace PathfinderMediaGroup\ApiLibrary\Api;

class ArticleApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/articles';

    /**
     * @param int   $limit
     * @param array $only
     * @param array $exclude
     *
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function getRecent(int $limit = 25, $only = [], $exclude = []): array
    {
        $data = $this->makeRequest($this->scopeEndpoint, [
            'limit'   => $limit,
            'only'    => $only,
            'exclude' => $exclude,
        ]);

        return json_decode($data, true) ?? [];
    }
}
