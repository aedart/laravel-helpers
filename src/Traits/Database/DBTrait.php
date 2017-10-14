<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Database;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\DB;

/**
 * DB Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Database\DBAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Database
 */
trait DBTrait
{
    /**
     * Database Connection Instance
     *
     * @var ConnectionInterface|null
     */
    protected $db = null;

    /**
     * Set db
     *
     * @param ConnectionInterface|null $connection Database Connection Instance
     *
     * @return self
     */
    public function setDb(?ConnectionInterface $connection)
    {
        $this->db = $connection;

        return $this;
    }

    /**
     * Get db
     *
     * If no db has been set, this method will
     * set and return a default db, if any such
     * value is available
     *
     * @see getDefaultDb()
     *
     * @return ConnectionInterface|null db or null if none db has been set
     */
    public function getDb(): ?ConnectionInterface
    {
        if (!$this->hasDb()) {
            $this->setDb($this->getDefaultDb());
        }
        return $this->db;
    }

    /**
     * Check if db has been set
     *
     * @return bool True if db has been set, false if not
     */
    public function hasDb(): bool
    {
        return isset($this->db);
    }

    /**
     * Get a default db value, if any is available
     *
     * @return ConnectionInterface|null A default db value or Null if no default value is available
     */
    public function getDefaultDb(): ?ConnectionInterface
    {
        // By default, the DB Facade does not return the
        // any actual database connection, but rather an
        // instance of \Illuminate\Database\DatabaseManager.
        // Therefore, we make sure only to obtain its
        // "connection", to make sure that its only the connection
        // instance that we obtain.
        $manager = DB::getFacadeRoot();
        if (isset($manager)) {
            return $manager->connection();
        }
        return $manager;
    }
}