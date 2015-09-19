<?php namespace Aedart\Laravel\Helpers\Contracts\Cache;

use Illuminate\Contracts\Cache\Repository;

/**
 * <h1>Cache Aware</h1>
 *
 * Components are able to specify and obtain a cache repository
 *
 * @see \Illuminate\Contracts\Cache\Repository
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface CacheAware {

    /**
     * Set the given cache
     *
     * @param Repository $repository Instance of a cache repository
     *
     * @return void
     */
    public function setCache(Repository $repository);

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
    public function getCache();

    /**
     * Get a default cache value, if any is available
     *
     * @return Repository|null A default cache value or Null if no default value is available
     */
    public function getDefaultCache();

    /**
     * Check if cache has been set
     *
     * @return bool True if cache has been set, false if not
     */
    public function hasCache();

    /**
     * Check if a default cache is available or not
     *
     * @return bool True of a default cache is available, false if not
     */
    public function hasDefaultCache();
}