<?php

namespace Aedart\Laravel\Helpers\Contracts\Cache;

use Illuminate\Contracts\Cache\Factory;

/**
 * <h1>Cache Factory Aware</h1>
 *
 * Components are able to specify and obtain a cache factory
 *
 * @see \Illuminate\Contracts\Cache\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface CacheFactoryAware
{
    /**
     * Set the given cache factory
     *
     * @param Factory $factory Instance of the Cache Factory
     *
     * @return void
     */
    public function setCacheFactory(Factory $factory);

    /**
     * Get the given cache factory
     *
     * If no cache factory has been set, this method will
     * set and return a default cache factory, if any such
     * value is available
     *
     * @see getDefaultCacheFactory()
     *
     * @return Factory|null cache factory or null if none cache factory has been set
     */
    public function getCacheFactory();

    /**
     * Get a default cache factory value, if any is available
     *
     * @return Factory|null A default cache factory value or Null if no default value is available
     */
    public function getDefaultCacheFactory();

    /**
     * Check if cache factory has been set
     *
     * @return bool True if cache factory has been set, false if not
     */
    public function hasCacheFactory();

    /**
     * Check if a default cache factory is available or not
     *
     * @return bool True of a default cache factory is available, false if not
     */
    public function hasDefaultCacheFactory();
}