<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Database;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Schema Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Database\SchemaAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Database
 */
trait SchemaTrait
{
    /**
     * Database Schema Builder Instance
     *
     * @var Builder|null
     */
    protected $schema = null;

    /**
     * Set schema
     *
     * @param Builder|null $builder Database Schema Builder Instance
     *
     * @return self
     */
    public function setSchema(?Builder $builder)
    {
        $this->schema = $builder;

        return $this;
    }

    /**
     * Get schema
     *
     * If no schema has been set, this method will
     * set and return a default schema, if any such
     * value is available
     *
     * @see getDefaultSchema()
     *
     * @return Builder|null schema or null if none schema has been set
     */
    public function getSchema(): ?Builder
    {
        if (!$this->hasSchema()) {
            $this->setSchema($this->getDefaultSchema());
        }
        return $this->schema;
    }

    /**
     * Check if schema has been set
     *
     * @return bool True if schema has been set, false if not
     */
    public function hasSchema(): bool
    {
        return isset($this->schema);
    }

    /**
     * Get a default schema value, if any is available
     *
     * @return Builder|null A default schema value or Null if no default value is available
     */
    public function getDefaultSchema(): ?Builder
    {
        // By default, the schema facade depends upon a
        // database connection being available. Therefore,
        // we need to ensure that this is true, before
        // attempting to return the facade-root
        $manager = DB::getFacadeRoot();
        if (isset($manager) && ! is_null($manager->connection())) {
            return Schema::getFacadeRoot();
        }
        return $manager;
    }
}