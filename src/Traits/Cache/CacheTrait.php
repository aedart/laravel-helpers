<?php namespace Aedart\Laravel\Helpers\Traits\Cache;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Cache;

/**
 * <h1>Cache Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Cache\CacheAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait CacheTrait {

    /**
     * Instance of a cache repository
     *
     * @var Repository|null
     */
    protected $cache = null;

    /**
     * Set the given cache
     *
     * @param Repository $repository Instance of a cache repository
     *
     * @return void
     */
    public function setCache(Repository $repository) {
        $this->cache = $repository;
    }

    /**
     * Get the given cache
     *
     * If no cache has been set, this method will
     * set and return a default cache, if any such
     * value is available
     *
     * @see getDefaultCache()
     *
     * @return Repository|null cache or null if none cache has been set
     */
    public function getCache() {
        if (!$this->hasCache() && $this->hasDefaultCache()) {
            $this->setCache($this->getDefaultCache());
        }
        return $this->cache;
    }

    /**
     * Get a default cache value, if any is available
     *
     * @return Repository|null A default cache value or Null if no default value is available
     */
    public function getDefaultCache() {
        // By default, the Cache Facade does not return the
        // any actual cache repository, but rather an
        // instance of \Illuminate\Cache\CacheManager.
        // Therefore, we make sure only to obtain its
        // "store", to make sure that its only the cache repository
        // instance that we obtain.
        $manager = Cache::getFacadeRoot();
        if(!is_null($manager)){
            return $manager->store();
        }
        return $manager;
    }

    /**
     * Check if cache has been set
     *
     * @return bool True if cache has been set, false if not
     */
    public function hasCache() {
        if (!is_null($this->cache)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default cache is available or not
     *
     * @return bool True of a default cache is available, false if not
     */
    public function hasDefaultCache() {
        if (!is_null($this->getDefaultCache())) {
            return true;
        }
        return false;
    }
}