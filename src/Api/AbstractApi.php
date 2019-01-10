<?php

namespace PathfinderMediaGroup\ApiLibrary\Api;

use PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth;
use PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException;

abstract class AbstractApi implements PmgApiInterface
{
    protected const BASE_URL = 'https://beast.pathfindermediagroup.com/api';

    /**
     * @var TokenAuth
     */
    protected $auth;

    /**
     * @var bool
     */
    protected $returnAssoc;

    /**
     * AbstractApi constructor.
     *
     * @param TokenAuth $auth
     */
    public function __construct(TokenAuth $auth, bool $returnAssoc = true)
    {
        $this->auth        = $auth;
        $this->returnAssoc = $returnAssoc;
    }

    /**
     * @param string $endpoint
     * @param array  $params
     * @param string $method
     *
     * @return bool|string
     *
     * @throws FailedPmgRequestException
     */
    protected function makeRequest(string $endpoint, array $params = [], string $method = 'GET')
    {
        $ch = curl_init();
        if ('GET' === $method) {
            curl_setopt($ch, CURLOPT_URL, self::BASE_URL.$endpoint.'?'.http_build_query($params));
        } else {
            curl_setopt($ch, CURLOPT_URL, self::BASE_URL.$endpoint);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        $headers = [
            'Content-Type:application/json',
            'Authorization: Basic '.$this->auth->getRequestToken(),
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        $output = curl_exec($ch);
        $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($code < 200 || $code >= 400) {
            throw new FailedPmgRequestException($output, $code);
        }

        return $output;
    }
}
