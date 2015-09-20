<?php namespace Aedart\Laravel\Helpers\Contracts\Database;

use Illuminate\Database\Schema\Builder;

/**
 * <h1>Schema Aware</h1>
 *
 * Components are able to specify and obtain Laravel's Database
 * schema builder
 *
 * @see \Illuminate\Database\Schema\Builder
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Database
 */
interface SchemaAware {

    /**
     * Set the given schema
     *
     * @param Builder $builder Instance of Laravel's Database Schema Builder
     *
     * @return void
     */
    public function setSchema(Builder $builder);

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
    public function getSchema();

    /**
     * Get a default schema value, if any is available
     *
     * @return Builder|null A default schema value or Null if no default value is available
     */
    public function getDefaultSchema();

    /**
     * Check if schema has been set
     *
     * @return bool True if schema has been set, false if not
     */
    public function hasSchema();

    /**
     * Check if a default schema is available or not
     *
     * @return bool True of a default schema is available, false if not
     */
    public function hasDefaultSchema();

    /**
     * Get a database schema builder instance for the
     * given connection.
     *
     * @param string $name
     *
     * @return \Illuminate\Database\Schema\Builder|null Returns null when no database connection is available
     */
    public function connection($name);
}