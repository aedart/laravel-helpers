<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Database\ConnectionInterface;

/**
 * <h1>DB Aware</h1>
 *
 * Components are able to specify and obtain a database connection
 *
 * @see \Illuminate\Database\ConnectionInterface
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface DBAware {

    /**
     * Set the given db
     *
     * @param ConnectionInterface $connection Instance of a database connection
     *
     * @return void
     */
    public function setDb(ConnectionInterface $connection);

    /**
     * Get the given db
     *
     * If no db has been set, this method will
     * set and return a default db, if any such
     * value is available
     *
     * @see getDefaultDb()
     *
     * @return ConnectionInterface|null db or null if none db has been set
     */
    public function getDb();

    /**
     * Get a default db value, if any is available
     *
     * @return ConnectionInterface|null A default db value or Null if no default value is available
     */
    public function getDefaultDb();

    /**
     * Check if db has been set
     *
     * @return bool True if db has been set, false if not
     */
    public function hasDb();

    /**
     * Check if a default db is available or not
     *
     * @return bool True of a default db is available, false if not
     */
    public function hasDefaultDb();
}