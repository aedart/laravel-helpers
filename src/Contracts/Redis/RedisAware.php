<?php namespace Aedart\Laravel\Helpers\Contracts\Redis;

use Illuminate\Contracts\Redis\Database;

/**
 * <h1>Redis Aware</h1>
 *
 * Components are able to specify and obtain a Redis Database
 * utility component.
 *
 * @see \Illuminate\Contracts\Redis\Database
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Redis
 */
interface RedisAware {

    /**
     * Set the given redis
     *
     * @param Database $database Instance of a Redis Database
     *
     * @return void
     */
    public function setRedis(Database $database);

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
    public function getRedis();

    /**
     * Get a default redis value, if any is available
     *
     * @return Database|null A default redis value or Null if no default value is available
     */
    public function getDefaultRedis();

    /**
     * Check if redis has been set
     *
     * @return bool True if redis has been set, false if not
     */
    public function hasRedis();

    /**
     * Check if a default redis is available or not
     *
     * @return bool True of a default redis is available, false if not
     */
    public function hasDefaultRedis();
}