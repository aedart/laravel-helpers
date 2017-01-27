<?php

use Aedart\Laravel\Helpers\Contracts\Cache\CacheFactoryAware;
use Aedart\Laravel\Helpers\Traits\Cache\CacheFactoryTrait;

/**
 * AwareOfDummyB
 *
 * FOR TESTING ONLY
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AwareOfDummyB implements CacheFactoryAware
{
    use CacheFactoryTrait;
}