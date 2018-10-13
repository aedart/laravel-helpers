<?php

namespace Aedart\Laravel\Helpers\Contracts\Cache;

use Illuminate\Contracts\Cache\Repository;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Cache\CacheAware, in aedart/athenaeum package
 *
 * Cache Aware
 *
 * @see \Illuminate\Contracts\Cache\Repository
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Cache
 */
interface CacheAware
{
    /**
     * Set cache
     *
     * @param Repository|null $repository Cache Repository instance
     *
     * @return self
     */
    public function setCache(?Repository $repository);

    /**
     * Get cache
     *
     * If no cache has been set, this method will
     * set and return a default cache, if any such
     * value is available
     *
     * @see getDefaultCache()
     *
     * @return Repository|null cache or null if none cache has been set
     */
    public function getCache(): ?Repository;

    /**
     * Check if cache has been set
     *
     * @return bool True if cache has been set, false if not
     */
    public function hasCache(): bool;

    /**
     * Get a default cache value, if any is available
     *
     * @return Repository|null A default cache value or Null if no default value is available
     */
    public function getDefaultCache(): ?Repository;
}
