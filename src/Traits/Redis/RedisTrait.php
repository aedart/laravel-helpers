<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Redis;

use Illuminate\Redis\Connections\Connection;
use Illuminate\Support\Facades\Redis;

/**
 * Redis Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Redis\RedisAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Redis
 */
trait RedisTrait
{
    /**
     * Redis Connection Instance
     *
     * @var Connection|null
     */
    protected $redis = null;

    /**
     * Set redis
     *
     * @param Connection|null $connection Redis Connection Instance
     *
     * @return self
     */
    public function setRedis(?Connection $connection)
    {
        $this->redis = $connection;

        return $this;
    }

    /**
     * Get redis
     *
     * If no redis has been set, this method will
     * set and return a default redis, if any such
     * value is available
     *
     * @see getDefaultRedis()
     *
     * @return Connection|null redis or null if none redis has been set
     */
    public function getRedis(): ?Connection
    {
        if (!$this->hasRedis()) {
            $this->setRedis($this->getDefaultRedis());
        }
        return $this->redis;
    }

    /**
     * Check if redis has been set
     *
     * @return bool True if redis has been set, false if not
     */
    public function hasRedis(): bool
    {
        return isset($this->redis);
    }

    /**
     * Get a default redis value, if any is available
     *
     * @return Connection|null A default redis value or Null if no default value is available
     */
    public function getDefaultRedis(): ?Connection
    {
        // From Laravel 5.4, the redis facade now returns the
        // Redis Manager, which is why we must use it to obtain
        // the default Redis connection. Thus, the
        // "Illuminate\Contracts\Redis\Database" interface is no
        // longer used.
        $factory = Redis::getFacadeRoot();
        if (isset($factory)) {
            return $factory->connection();
        }
        return $factory;
    }
}