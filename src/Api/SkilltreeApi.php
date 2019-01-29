<?php

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
}
