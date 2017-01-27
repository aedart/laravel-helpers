<?php

namespace Aedart\Laravel\Helpers\Contracts\Filesystem;

use Illuminate\Contracts\Filesystem\Filesystem;

/**
 * <h1>Storage (Disk) Aware</h1>
 *
 * Components are able to specify and obtain a storage disk - a filesystem instance
 *
 * @see \Illuminate\Contracts\Filesystem\Filesystem
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Filesystem
 */
interface StorageAware
{
    /**
     * Set the given storage
     *
     * @param Filesystem $disk Instance of a Storage Disk (a Filesystem instance)
     *
     * @return void
     */
    public function setStorage(Filesystem $disk);

    /**
     * Get the given storage
     *
     * If no storage has been set, this method will
     * set and return a default storage, if any such
     * value is available
     *
     * @see getDefaultStorage()
     *
     * @return Filesystem|null storage or null if none storage has been set
     */
    public function getStorage();

    /**
     * Get a default storage value, if any is available
     *
     * @return Filesystem|null A default storage value or Null if no default value is available
     */
    public function getDefaultStorage();

    /**
     * Check if storage has been set
     *
     * @return bool True if storage has been set, false if not
     */
    public function hasStorage();

    /**
     * Check if a default storage is available or not
     *
     * @return bool True of a default storage is available, false if not
     */
    public function hasDefaultStorage();
}