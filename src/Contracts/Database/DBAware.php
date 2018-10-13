<?php

namespace Aedart\Laravel\Helpers\Contracts\Database;

use Illuminate\Database\ConnectionInterface;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Database\DbAware, in aedart/athenaeum package
 *
 * DB Aware
 *
 * @see \Illuminate\Database\ConnectionInterface
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Database
 */
interface DBAware
{
    /**
     * Set db
     *
     * @param ConnectionInterface|null $connection Database Connection Instance
     *
     * @return self
     */
    public function setDb(?ConnectionInterface $connection);

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
    public function getDb(): ?ConnectionInterface;

    /**
     * Check if db has been set
     *
     * @return bool True if db has been set, false if not
     */
    public function hasDb(): bool;

    /**
     * Get a default db value, if any is available
     *
     * @return ConnectionInterface|null A default db value or Null if no default value is available
     */
    public function getDefaultDb(): ?ConnectionInterface;
}
