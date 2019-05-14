<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

namespace PathfinderMediaGroup\ApiLibrary\Api;

class ServersApi extends AbstractApi
{
    const PLATFORM_PC   = 'PC';

    const PLATFORM_PS4  = 'PS4';

    const PLATFORM_XBOX = 'XBOX';

    const REGION_EU  = 'EU';

    const REGION_NA  = 'NA';

    const REGION_PTS = 'PTS';

    const STATUS_DOWN = 0;

    const STATUS_UP   = 1;

    private $scopeEndpoint = '/eso/servers';

    /**
     * @return array
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function getAll(): array
    {
        $data = $this->makeRequest($this->scopeEndpoint);

        return json_decode($data, true) ?? [];
    }

    /**
     * @param string $platform
     * @param string $region
     *
     * @return bool
     *
     * @throws \PathfinderMediaGroup\ApiLibrary\Exception\FailedPmgRequestException
     */
    public function getStatusFor(string $platform, string $region): bool
    {
        $data = $this->makeRequest($this->scopeEndpoint);

        foreach (json_decode($data, true) as $server) {
            if ($server['name'] === $platform.' '.$region) {
                return (bool) $server['status'];
            }
        }

        return false;
    }
}
