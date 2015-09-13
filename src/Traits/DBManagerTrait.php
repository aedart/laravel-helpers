<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;

/**
 * <h1>DB Manager Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\DBManagerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait DBManagerTrait{

    /**
     * Instance of the Database Manager
     *
     * @var DatabaseManager|null
     */
    protected $dbManager = null;

    /**
     * Set the given db manager
     *
     * @param DatabaseManager $manager Instance of the Database Manager
     *
     * @return void
     */
    public function setDbManager(DatabaseManager $manager) {
        $this->dbManager = $manager;
    }

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
    public function getDbManager() {
        if (!$this->hasDbManager() && $this->hasDefaultDbManager()) {
            $this->setDbManager($this->getDefaultDbManager());
        }
        return $this->dbManager;
    }

    /**
     * Get a default db manager value, if any is available
     *
     * @return DatabaseManager|null A default db manager value or Null if no default value is available
     */
    public function getDefaultDbManager() {
        return DB::getFacadeRoot();
    }

    /**
     * Check if db manager has been set
     *
     * @return bool True if db manager has been set, false if not
     */
    public function hasDbManager() {
        if (!is_null($this->dbManager)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default db manager is available or not
     *
     * @return bool True of a default db manager is available, false if not
     */
    public function hasDefaultDbManager() {
        if (!is_null($this->getDefaultDbManager())) {
            return true;
        }
        return false;
    }
}