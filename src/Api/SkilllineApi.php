<?php

namespace PathfinderMediaGroup\ApiLibrary\Api;

class SkilllineApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/skilllines';

    /**
     * @param int $skillline_id
     *
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function get(int $skillline_id): array
    {
        $data = $this->makeRequest($this->scopeEndpoint.'/'.$skillline_id);

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
