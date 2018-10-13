<?php

namespace Aedart\Laravel\Helpers\Contracts\Redis;

use Illuminate\Contracts\Redis\Factory;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Redis\RedisFactoryAware, in aedart/athenaeum package
 *
 * Redis Factory Aware
 *
 * @see \Illuminate\Contracts\Redis\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Redis
 */
interface RedisFactoryAware
{
    /**
     * Set redis factory
     *
     * @param Factory|null $factory Redis Factory Instance
     *
     * @return self
     */
    public function setRedisFactory(?Factory $factory);

    /**
     * Get redis factory
     *
     * If no redis factory has been set, this method will
     * set and return a default redis factory, if any such
     * value is available
     *
     * @see getDefaultRedisFactory()
     *
     * @return Factory|null redis factory or null if none redis factory has been set
     */
    public function getRedisFactory(): ?Factory;

    /**
     * Check if redis factory has been set
     *
     * @return bool True if redis factory has been set, false if not
     */
    public function hasRedisFactory(): bool;

    /**
     * Get a default redis factory value, if any is available
     *
     * @return Factory|null A default redis factory value or Null if no default value is available
     */
    public function getDefaultRedisFactory(): ?Factory;
}
