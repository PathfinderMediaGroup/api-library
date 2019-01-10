<?php

namespace PathfinderMediaGroup\ApiLibrary\Api;

class CrownstoreItemApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/crownstoreitems';

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

        return json_decode($data, $this->returnAssoc) ?? [];
    }
}
