<?php

namespace PathfinderMediaGroup\ApiLibrary\Api;

use PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth;

interface PmgApiInterface
{
    public function __construct(TokenAuth $auth);
}
