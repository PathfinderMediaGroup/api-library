<?php

namespace PathfinderMediaGroup\ApiLibrary\Api;

class PledgesApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/pledges';

    /**
     * @param int $daysFromNow
     *
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function get(int $daysFromNow = 0): array
    {
        $data = $this->makeRequest($this->scopeEndpoint, ['daysFormNow' => $daysFromNow]);

        return json_decode($data, $this->returnAssoc) ?? [];
    }
}
