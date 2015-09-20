<?php namespace Aedart\Laravel\Helpers\Traits\Redis;

use Illuminate\Contracts\Redis\Database;
use Illuminate\Support\Facades\Redis;

/**
 * <h1>Redis Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Redis\RedisAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Redis
 */
trait RedisTrait {

    /**
     * Instance of a Redis Database
     *
     * @var Database|null
     */
    protected $redis = null;

    /**
     * Set the given redis
     *
     * @param Database $database Instance of a Redis Database
     *
     * @return void
     */
    public function setRedis(Database $database) {
        $this->redis = $database;
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
     * @return Database|null redis or null if none redis has been set
     */
    public function getRedis() {
        if (!$this->hasRedis() && $this->hasDefaultRedis()) {
            $this->setRedis($this->getDefaultRedis());
        }
        return $this->redis;
    }

    /**
     * Get a default redis value, if any is available
     *
     * @return Database|null A default redis value or Null if no default value is available
     */
    public function getDefaultRedis() {
        return Redis::getFacadeRoot();
    }

    /**
     * Check if redis has been set
     *
     * @return bool True if redis has been set, false if not
     */
    public function hasRedis() {
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
    public function hasDefaultRedis() {
        if (!is_null($this->getDefaultRedis())) {
            return true;
        }
        return false;
    }
}