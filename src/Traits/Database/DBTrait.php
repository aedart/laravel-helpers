<?php

namespace Aedart\Laravel\Helpers\Traits\Database;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\DB;

/**
 * <h1>DB Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Database\DBAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait DBTrait
{
    /**
     * Instance of a database connection
     *
     * @var ConnectionInterface|null
     */
    protected $db = null;

    /**
     * Set the given db
     *
     * @param ConnectionInterface $connection Instance of a database connection
     *
     * @return void
     */
    public function setDb(ConnectionInterface $connection)
    {
        $this->db = $connection;
    }

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
    public function getDb()
    {
        if (!$this->hasDb() && $this->hasDefaultDb()) {
            $this->setDb($this->getDefaultDb());
        }
        return $this->db;
    }

    /**
     * Get a default db value, if any is available
     *
     * @return ConnectionInterface|null A default db value or Null if no default value is available
     */
    public function getDefaultDb()
    {
        static $db;
        if(isset($db)){
            return $db;
        }

        // By default, the DB Facade does not return the
        // any actual database connection, but rather an
        // instance of \Illuminate\Database\DatabaseManager.
        // Therefore, we make sure only to obtain its
        // "connection", to make sure that its only the connection
        // instance that we obtain.
        $manager = DB::getFacadeRoot();
        if (!is_null($manager)) {
            return $db = $manager->connection();
        }
        return $manager;
    }

    /**
     * Check if db has been set
     *
     * @return bool True if db has been set, false if not
     */
    public function hasDb()
    {
        return isset($this->db);
    }

    /**
     * Check if a default db is available or not
     *
     * @return bool True of a default db is available, false if not
     */
    public function hasDefaultDb()
    {
        $default = $this->getDefaultDb();
        return isset($default);
    }
}