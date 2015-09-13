<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Database\DatabaseManager;

/**
 * <h1>DB Manager Aware</h1>
 *
 * Components are able to specify and obtain a database manager
 *
 * @see \Illuminate\Database\DatabaseManager
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface DBManagerAware {

    /**
     * Set the given db manager
     *
     * @param DatabaseManager $manager Instance of the Database Manager
     *
     * @return void
     */
    public function setDbManager(DatabaseManager $manager);

    /**
     * Get the given db manager
     *
     * If no db manager has been set, this method will
     * set and return a default db manager, if any such
     * value is available
     *
     * @see getDefaultDbManager()
     *
     * @return DatabaseManager|null db manager or null if none db manager has been set
     */
    public function getDbManager();

    /**
     * Get a default db manager value, if any is available
     *
     * @return DatabaseManager|null A default db manager value or Null if no default value is available
     */
    public function getDefaultDbManager();

    /**
     * Check if db manager has been set
     *
     * @return bool True if db manager has been set, false if not
     */
    public function hasDbManager();

    /**
     * Check if a default db manager is available or not
     *
     * @return bool True of a default db manager is available, false if not
     */
    public function hasDefaultDbManager();
}