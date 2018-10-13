<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Database;

use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;

/**
 * @deprecated Use \Aedart\Support\Helpers\Database\ConnectionResolverTrait, in aedart/athenaeum package
 *
 * DB Manager Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Database\DBManagerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Database
 */
trait DBManagerTrait
{
    /**
     * DB Manager Instance
     *
     * @var DatabaseManager|null
     */
    protected $dbManager = null;

    /**
     * Set db manager
     *
     * @param DatabaseManager|null $manager DB Manager Instance
     *
     * @return self
     */
    public function setDbManager(?DatabaseManager $manager)
    {
        $this->dbManager = $manager;

        return $this;
    }

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
    public function getDbManager(): ?DatabaseManager
    {
        if (!$this->hasDbManager()) {
            $this->setDbManager($this->getDefaultDbManager());
        }
        return $this->dbManager;
    }

    /**
     * Check if db manager has been set
     *
     * @return bool True if db manager has been set, false if not
     */
    public function hasDbManager(): bool
    {
        return isset($this->dbManager);
    }

    /**
     * Get a default db manager value, if any is available
     *
     * @return DatabaseManager|null A default db manager value or Null if no default value is available
     */
    public function getDefaultDbManager(): ?DatabaseManager
    {
        return DB::getFacadeRoot();
    }
}
