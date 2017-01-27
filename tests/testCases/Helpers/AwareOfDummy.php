<?php

use Aedart\Laravel\Helpers\Contracts\Cache\CacheAware;
use Aedart\Laravel\Helpers\Traits\Cache\CacheTrait;

/**
 * Aware Of Dummy
 *
 * FOR TESTING ONLY
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AwareOfDummy implements CacheAware {
    use CacheTrait;
}