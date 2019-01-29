<?php

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

        return json_decode($data, $this->returnAssoc) ?? [];
    }
}
