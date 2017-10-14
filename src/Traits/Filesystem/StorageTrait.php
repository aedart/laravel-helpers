<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Filesystem;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

/**
 * Cloud Storage Filesystem Disk Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Filesystem\StorageAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Filesystem
 */
trait StorageTrait
{
    /**
     * Storage Disk Instance (Cloud Storage Filesystem disk)
     *
     * @var Filesystem|null
     */
    protected $storage = null;

    /**
     * Set storage
     *
     * @param Filesystem|null $disk Storage Disk Instance (Cloud Storage Filesystem disk)
     *
     * @return self
     */
    public function setStorage(?Filesystem $disk)
    {
        $this->storage = $disk;

        return $this;
    }

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
    public function getStorage(): ?Filesystem
    {
        if (!$this->hasStorage()) {
            $this->setStorage($this->getDefaultStorage());
        }
        return $this->storage;
    }

    /**
     * Check if storage has been set
     *
     * @return bool True if storage has been set, false if not
     */
    public function hasStorage(): bool
    {
        return isset($this->storage);
    }

    /**
     * Get a default storage value, if any is available
     *
     * @return Filesystem|null A default storage value or Null if no default value is available
     */
    public function getDefaultStorage(): ?Filesystem
    {
        // By default, the Storage Facade does not return the
        // any actual storage fisk, but rather an
        // instance of \Illuminate\Filesystem\FilesystemManager.
        // Therefore, we make sure only to obtain its
        // "disk", to make sure that its the correct
        // instance that we obtain.
        $manager = Storage::getFacadeRoot();
        if (isset($manager)) {
            return $manager->disk();
        }
        return $manager;
    }
}