<?php

namespace Aedart\Laravel\Helpers\Traits\Filesystem;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

/**
 * <h1>Storage (Disk) Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Filesystem\StorageAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Filesystem
 */
trait StorageTrait
{
    /**
     * Instance of a Storage Disk (a Filesystem instance)
     *
     * @var Filesystem|null
     */
    protected $storage = null;

    /**
     * Set the given storage
     *
     * @param Filesystem $disk Instance of a Storage Disk (a Filesystem instance)
     *
     * @return void
     */
    public function setStorage(Filesystem $disk)
    {
        $this->storage = $disk;
    }

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
    public function getStorage()
    {
        if (!$this->hasStorage() && $this->hasDefaultStorage()) {
            $this->setStorage($this->getDefaultStorage());
        }
        return $this->storage;
    }

    /**
     * Get a default storage value, if any is available
     *
     * @return Filesystem|null A default storage value or Null if no default value is available
     */
    public function getDefaultStorage()
    {
        // By default, the Storage Facade does not return the
        // any actual storage fisk, but rather an
        // instance of \Illuminate\Filesystem\FilesystemManager.
        // Therefore, we make sure only to obtain its
        // "disk", to make sure that its the correct
        // instance that we obtain.
        $manager = Storage::getFacadeRoot();
        if (!is_null($manager)) {
            return $manager->disk();
        }
        return $manager;
    }

    /**
     * Check if storage has been set
     *
     * @return bool True if storage has been set, false if not
     */
    public function hasStorage()
    {
        return isset($this->storage);
    }

    /**
     * Check if a default storage is available or not
     *
     * @return bool True of a default storage is available, false if not
     */
    public function hasDefaultStorage()
    {
        $default = $this->getDefaultStorage();
        return isset($default);
    }
}