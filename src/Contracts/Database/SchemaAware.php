<?php

namespace Aedart\Laravel\Helpers\Contracts\Database;

use Illuminate\Database\Schema\Builder;

/**
 * Schema Aware
 *
 * @see \Illuminate\Database\Schema\Builder
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Database
 */
interface SchemaAware
{
    /**
     * Set schema
     *
     * @param Builder|null $builder Database Schema Builder Instance
     *
     * @return self
     */
    public function setSchema(?Builder $builder);

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
    public function getSchema(): ?Builder;

    /**
     * Check if schema has been set
     *
     * @return bool True if schema has been set, false if not
     */
    public function hasSchema(): bool;

    /**
     * Get a default schema value, if any is available
     *
     * @return Builder|null A default schema value or Null if no default value is available
     */
    public function getDefaultSchema(): ?Builder;
}