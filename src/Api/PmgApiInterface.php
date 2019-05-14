<?php

/*
 * This file is part of the PMG Api Library project.
 * @copyright Pathfinder Media Group. All rights reserved
 *
 * Please see the license attached to this project.
 */

namespace PathfinderMediaGroup\ApiLibrary\Api;

use PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth;

interface PmgApiInterface
{
    public function __construct(TokenAuth $auth);
}
