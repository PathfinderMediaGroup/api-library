<?php
/**
 * Created by PhpStorm.
 * User: woeler
 * Date: 10/01/19
 * Time: 14:53.
 */

namespace PathfinderMediaGroup\ApiLibrary\Api;

class PricesApi extends AbstractApi
{
    private $scopeEndpoint = '/eso/prices';

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
