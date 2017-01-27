<?php namespace Aedart\Laravel\Helpers\Traits\Redis;

use Illuminate\Redis\Connections\Connection;
use Illuminate\Support\Facades\Redis;

/**
 * <h1>Redis Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Redis\RedisAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Redis
 */
trait RedisTrait
{
    /**
     * Instance of a Redis Connection
     *
     * @var Connection|null
     */
    protected $redis = null;

    /**
     * Set the given redis
     *
     * @param Connection $connection Instance of a Redis Connection
     *
     * @return void
     */
    public function setRedis(Connection $connection)
    {
        $this->redis = $connection;
    }

    /**
     * Get the given redis
     *
     * If no redis has been set, this method will
     * set and return a default redis, if any such
     * value is available
     *
     * @see getDefaultRedis()
     *
     * @return Connection|null redis or null if none redis has been set
     */
    public function getRedis()
    {
        if (!$this->hasRedis() && $this->hasDefaultRedis()) {
            $this->setRedis($this->getDefaultRedis());
        }
        return $this->redis;
    }

    /**
     * Get a default redis value, if any is available
     *
     * @return Connection|null A default redis value or Null if no default value is available
     */
    public function getDefaultRedis()
    {

        // From Laravel 5.4, the redis facade now returns the
        // Redis Manager, which is why we must use it to obtain
        // the default Redis connection. Thus, the
        // "Illuminate\Contracts\Redis\Database" interface is no
        // longer used.
        $factory = Redis::getFacadeRoot();
        if (!is_null($factory)) {
            return $factory->connection();
        }
        return $factory;
    }

    /**
     * Check if redis has been set
     *
     * @return bool True if redis has been set, false if not
     */
    public function hasRedis()
    {
        if (!is_null($this->redis)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default redis is available or not
     *
     * @return bool True of a default redis is available, false if not
     */
    public function hasDefaultRedis()
    {
        if (!is_null($this->getDefaultRedis())) {
            return true;
        }
        return false;
    }
}