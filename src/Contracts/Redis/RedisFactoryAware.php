<?php

namespace Aedart\Laravel\Helpers\Contracts\Redis;

use Illuminate\Contracts\Redis\Factory;

/**
 * <h1>Redis Factory Aware</h1>
 *
 * Component is aware of a Redis Factory, which can also be specified.
 *
 * @see \Illuminate\Contracts\Redis\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Redis
 */
interface RedisFactoryAware
{
    /**
     * Set the given redis factory
     *
     * @param Factory $factory Redis Factory
     *
     * @return void
     */
    public function setRedisFactory(Factory $factory);

    /**
     * Get the given redis factory
     *
     * If no redis factory has been set, this method will
     * set and return a default redis factory, if any such
     * value is available
     *
     * @see getDefaultRedisFactory()
     *
     * @return Factory|null redis factory or null if none redis factory has been set
     */
    public function getRedisFactory();

    /**
     * Get a default redis factory value, if any is available
     *
     * @return Factory|null A default redis factory value or Null if no default value is available
     */
    public function getDefaultRedisFactory();

    /**
     * Check if redis factory has been set
     *
     * @return bool True if redis factory has been set, false if not
     */
    public function hasRedisFactory();

    /**
     * Check if a default redis factory is available or not
     *
     * @return bool True of a default redis factory is available, false if not
     */
    public function hasDefaultRedisFactory();
}