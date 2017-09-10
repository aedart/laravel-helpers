<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Cache;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Cache;

/**
 * Cache Store Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Cache\CacheStoreAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Cache
 */
trait CacheStoreTrait
{
    /**
     * Cache Store instance
     *
     * @var Store|null
     */
    protected $cacheStore = null;

    /**
     * Set cache store
     *
     * @param Store|null $store Cache Store instance
     *
     * @return self
     */
    public function setCacheStore(?Store $store)
    {
        $this->cacheStore = $store;

        return $this;
    }

    /**
     * Get cache store
     *
     * If no cache store has been set, this method will
     * set and return a default cache store, if any such
     * value is available
     *
     * @see getDefaultCacheStore()
     *
     * @return Store|null cache store or null if none cache store has been set
     */
    public function getCacheStore(): ?Store
    {
        if (!$this->hasCacheStore()) {
            $this->setCacheStore($this->getDefaultCacheStore());
        }
        return $this->cacheStore;
    }

    /**
     * Check if cache store has been set
     *
     * @return bool True if cache store has been set, false if not
     */
    public function hasCacheStore(): bool
    {
        return isset($this->cacheStore);
    }

    /**
     * Get a default cache store value, if any is available
     *
     * @return Store|null A default cache store value or Null if no default value is available
     */
    public function getDefaultCacheStore(): ?Store
    {
        // We do not know what store is desired. Therefore,
        // the safest bet is to obtain the default
        $manager = Cache::getFacadeRoot();
        if (isset($manager)) {
            /** @var Repository $repository */
            $repository = $manager->store();
            return $repository->getStore();
        }
        return $manager;
    }
}