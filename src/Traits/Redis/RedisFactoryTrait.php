<?php

namespace Aedart\Laravel\Helpers\Traits\Redis;

use Illuminate\Contracts\Redis\Factory;
use Illuminate\Support\Facades\Redis;

/**
 * <h1>Redis Factory Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Redis\RedisFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Redis
 */
trait RedisFactoryTrait
{
    /**
     * Redis Factory
     *
     * @var Factory|null
     */
    protected $redisFactory = null;

    /**
     * Set the given redis factory
     *
     * @param Factory $factory Redis Factory
     *
     * @return void
     */
    public function setRedisFactory(Factory $factory)
    {
        $this->redisFactory = $factory;
    }

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
    public function getRedisFactory()
    {
        if (!$this->hasRedisFactory() && $this->hasDefaultRedisFactory()) {
            $this->setRedisFactory($this->getDefaultRedisFactory());
        }
        return $this->redisFactory;
    }

    /**
     * Get a default redis factory value, if any is available
     *
     * @return Factory|null A default redis factory value or Null if no default value is available
     */
    public function getDefaultRedisFactory()
    {
        static $factory;
        return isset($factory) ? $factory : $factory = Redis::getFacadeRoot();
    }

    /**
     * Check if redis factory has been set
     *
     * @return bool True if redis factory has been set, false if not
     */
    public function hasRedisFactory()
    {
        return isset($this->redisFactory);
    }

    /**
     * Check if a default redis factory is available or not
     *
     * @return bool True of a default redis factory is available, false if not
     */
    public function hasDefaultRedisFactory()
    {
        $default = $this->getDefaultRedisFactory();
        return isset($default);
    }
}