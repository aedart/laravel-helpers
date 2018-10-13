<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Redis;

use Illuminate\Contracts\Redis\Factory;
use Illuminate\Support\Facades\Redis;

/**
 * @deprecated Use \Aedart\Support\Helpers\Redis\RedisFactoryTrait, in aedart/athenaeum package
 *
 * Redis Factory Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Redis\RedisFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Redis
 */
trait RedisFactoryTrait
{
    /**
     * Redis Factory Instance
     *
     * @var Factory|null
     */
    protected $redisFactory = null;

    /**
     * Set redis factory
     *
     * @param Factory|null $factory Redis Factory Instance
     *
     * @return self
     */
    public function setRedisFactory(?Factory $factory)
    {
        $this->redisFactory = $factory;

        return $this;
    }

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
    public function getRedisFactory(): ?Factory
    {
        if (!$this->hasRedisFactory()) {
            $this->setRedisFactory($this->getDefaultRedisFactory());
        }
        return $this->redisFactory;
    }

    /**
     * Check if redis factory has been set
     *
     * @return bool True if redis factory has been set, false if not
     */
    public function hasRedisFactory(): bool
    {
        return isset($this->redisFactory);
    }

    /**
     * Get a default redis factory value, if any is available
     *
     * @return Factory|null A default redis factory value or Null if no default value is available
     */
    public function getDefaultRedisFactory(): ?Factory
    {
        return Redis::getFacadeRoot();
    }
}
