<?php

namespace Aedart\Laravel\Helpers\Contracts\Filesystem;

use Illuminate\Contracts\Filesystem\Factory;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Filesystem\StorageFactoryAware, in aedart/athenaeum package
 *
 * Cloud Storage Factory Aware
 *
 * @see \Illuminate\Contracts\Filesystem\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Filesystem
 */
interface StorageFactoryAware
{
    /**
     * Set storage factory
     *
     * @param Factory|null $factory Cloud Storage Factory Instance
     *
     * @return self
     */
    public function setStorageFactory(?Factory $factory);

    /**
     * Get storage factory
     *
     * If no storage factory has been set, this method will
     * set and return a default storage factory, if any such
     * value is available
     *
     * @see getDefaultStorageFactory()
     *
     * @return Factory|null storage factory or null if none storage factory has been set
     */
    public function getStorageFactory(): ?Factory;

    /**
     * Check if storage factory has been set
     *
     * @return bool True if storage factory has been set, false if not
     */
    public function hasStorageFactory(): bool;

    /**
     * Get a default storage factory value, if any is available
     *
     * @return Factory|null A default storage factory value or Null if no default value is available
     */
    public function getDefaultStorageFactory(): ?Factory;
}
