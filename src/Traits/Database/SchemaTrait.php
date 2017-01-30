<?php

namespace Aedart\Laravel\Helpers\Traits\Database;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * <h1>Schema Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Database\SchemaAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Database
 */
trait SchemaTrait
{
    /**
     * Instance of Laravel's Database Schema Builder
     *
     * @var Builder|null
     */
    protected $schema = null;

    /**
     * Set the given schema
     *
     * @param Builder $builder Instance of Laravel's Database Schema Builder
     *
     * @return void
     */
    public function setSchema(Builder $builder)
    {
        $this->schema = $builder;
    }

    /**
     * Get the given schema
     *
     * If no schema has been set, this method will
     * set and return a default schema, if any such
     * value is available
     *
     * @see getDefaultSchema()
     *
     * @return Builder|null schema or null if none schema has been set
     */
    public function getSchema()
    {
        if (!$this->hasSchema() && $this->hasDefaultSchema()) {
            $this->setSchema($this->getDefaultSchema());
        }
        return $this->schema;
    }

    /**
     * Get a default schema value, if any is available
     *
     * @return Builder|null A default schema value or Null if no default value is available
     */
    public function getDefaultSchema()
    {
        // By default, the schema facade depends upon a
        // database connection being available. Therefore,
        // we need to ensure that this is true, before
        // attempting to return the facade-root
        $manager = DB::getFacadeRoot();
        if (!is_null($manager) && !is_null($manager->connection())) {
            return Schema::getFacadeRoot();
        }
        return $manager;
    }

    /**
     * Check if schema has been set
     *
     * @return bool True if schema has been set, false if not
     */
    public function hasSchema()
    {
        return isset($this->schema);
    }

    /**
     * Check if a default schema is available or not
     *
     * @return bool True of a default schema is available, false if not
     */
    public function hasDefaultSchema()
    {
        $default = $this->getDefaultSchema();
        return isset($default);
    }

    /**
     * Get a database schema builder instance for the
     * given connection.
     *
     * @param string $name
     *
     * @return \Illuminate\Database\Schema\Builder|null Returns null when no database connection is available
     */
    public function connection($name)
    {
        // We do this check to ensure that a connection is available
        $manager = DB::getFacadeRoot();
        if (isset($manager) && !is_null($manager->connection())) {
            return Schema::connection($name);
        }
        return $manager;
    }
}