<?php

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

        return json_decode($data, $this->returnAssoc) ?? [];
    }

    /**
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function getAll(): array
    {
        $data = $this->makeRequest($this->scopeEndpoint);

        return json_decode($data, $this->returnAssoc) ?? [];
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

        return json_decode($data, $this->returnAssoc) ?? [];
    }
}
