<?php

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

        return json_decode($data, $this->returnAssoc) ?? [];
    }
}
