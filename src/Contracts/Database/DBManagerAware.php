<?php

namespace Aedart\Laravel\Helpers\Contracts\Database;

use Illuminate\Database\DatabaseManager;

/**
 * DB Manager Aware
 *
 * @see \Illuminate\Database\DatabaseManager
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Database
 */
interface DBManagerAware
{
    /**
     * Set db manager
     *
     * @param DatabaseManager|null $manager DB Manager Instance
     *
     * @return self
     */
    public function setDbManager(?DatabaseManager $manager);

    /**
     * Get db manager
     *
     * If no db manager has been set, this method will
     * set and return a default db manager, if any such
     * value is available
     *
     * @see getDefaultDbManager()
     *
     * @return DatabaseManager|null db manager or null if none db manager has been set
     */
    public function getDbManager(): ?DatabaseManager;

    /**
     * Check if db manager has been set
     *
     * @return bool True if db manager has been set, false if not
     */
    public function hasDbManager(): bool;

    /**
     * Get a default db manager value, if any is available
     *
     * @return DatabaseManager|null A default db manager value or Null if no default value is available
     */
    public function getDefaultDbManager(): ?DatabaseManager;
}