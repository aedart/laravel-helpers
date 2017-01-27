<?php

namespace Aedart\Laravel\Helpers\Traits\Cache;

use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\Facades\Cache;

/**
 * <h1>Cache Factory Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Cache\CacheFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait CacheFactoryTrait
{
    /**
     * Instance of the Cache Factory
     *
     * @var Factory|null
     */
    protected $cacheFactory = null;

    /**
     * Set the given cache factory
     *
     * @param Factory $factory Instance of the Cache Factory
     *
     * @return void
     */
    public function setCacheFactory(Factory $factory)
    {
        $this->cacheFactory = $factory;
    }

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
    public function getCacheFactory()
    {
        if (!$this->hasCacheFactory() && $this->hasDefaultCacheFactory()) {
            $this->setCacheFactory($this->getDefaultCacheFactory());
        }
        return $this->cacheFactory;
    }

    /**
     * Get a default cache factory value, if any is available
     *
     * @return Factory|null A default cache factory value or Null if no default value is available
     */
    public function getDefaultCacheFactory()
    {
        return Cache::getFacadeRoot();
    }

    /**
     * Check if cache factory has been set
     *
     * @return bool True if cache factory has been set, false if not
     */
    public function hasCacheFactory()
    {
        if (!is_null($this->cacheFactory)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default cache factory is available or not
     *
     * @return bool True of a default cache factory is available, false if not
     */
    public function hasDefaultCacheFactory()
    {
        if (!is_null($this->getDefaultCacheFactory())) {
            return true;
        }
        return false;
    }
}