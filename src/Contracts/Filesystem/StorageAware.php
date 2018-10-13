<?php

namespace Aedart\Laravel\Helpers\Contracts\Filesystem;

use Illuminate\Contracts\Filesystem\Filesystem;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Filesystem\StorageAware, in aedart/athenaeum package
 *
 * Cloud Storage Filesystem disk Aware
 *
 * @see \Illuminate\Contracts\Filesystem\Filesystem
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Filesystem
 */
interface StorageAware
{
    /**
     * Set storage
     *
     * @param Filesystem|null $disk Storage Disk Instance (Cloud Storage Filesystem disk)
     *
     * @return self
     */
    public function setStorage(?Filesystem $disk);

    /**
     * Get storage
     *
     * If no storage has been set, this method will
     * set and return a default storage, if any such
     * value is available
     *
     * @see getDefaultStorage()
     *
     * @return Filesystem|null storage or null if none storage has been set
     */
    public function getStorage(): ?Filesystem;

    /**
     * Check if storage has been set
     *
     * @return bool True if storage has been set, false if not
     */
    public function hasStorage(): bool;

    /**
     * Get a default storage value, if any is available
     *
     * @return Filesystem|null A default storage value or Null if no default value is available
     */
    public function getDefaultStorage(): ?Filesystem;
}
