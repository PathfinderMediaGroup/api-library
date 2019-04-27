# PMG API Library

Install via Composer
```
composer require pathfindermediagroup/api-library
```

## Usage
```php
<?php

$auth = new \PathfinderMediaGroup\ApiLibrary\Auth\TokenAuth('yourapitokenhere');

$api =  new \PathfinderMediaGroup\ApiLibrary\Api\SetApi($auth);

$allSets = $api->getAll();

$specificSet = $api->get(1);

$setSearch = $api->search('ebon armor');
```