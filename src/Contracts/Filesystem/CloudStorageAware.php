<?php

namespace Aedart\Laravel\Helpers\Contracts\Filesystem;

use Illuminate\Contracts\Filesystem\Cloud;

/**
 * Cloud Storage Filesystem Disk Aware
 *
 * @see \Illuminate\Contracts\Filesystem\Cloud
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Filesystem
 */
interface CloudStorageAware
{
    /**
     * Set cloud storage
     *
     * @param Cloud|null $disk Cloud Storage Filesystem Disk
     *
     * @return self
     */
    public function setCloudStorage(?Cloud $disk);

    /**
     * Get cloud storage
     *
     * If no cloud storage has been set, this method will
     * set and return a default cloud storage, if any such
     * value is available
     *
     * @see getDefaultCloudStorage()
     *
     * @return Cloud|null cloud storage or null if none cloud storage has been set
     */
    public function getCloudStorage(): ?Cloud;

    /**
     * Check if cloud storage has been set
     *
     * @return bool True if cloud storage has been set, false if not
     */
    public function hasCloudStorage(): bool;

    /**
     * Get a default cloud storage value, if any is available
     *
     * @return Cloud|null A default cloud storage value or Null if no default value is available
     */
    public function getDefaultCloudStorage(): ?Cloud;
}