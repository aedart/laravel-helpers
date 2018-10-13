<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Filesystem;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Support\Facades\Storage;

/**
 * @deprecated Use \Aedart\Support\Helpers\Filesystem\CloudStorageTrait, in aedart/athenaeum package
 *
 * Cloud Storage Filesystem Disk Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Filesystem\CloudStorageAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Filesystem
 */
trait CloudStorageTrait
{
    /**
     * Cloud Storage Filesystem Disk
     *
     * @var Cloud|null
     */
    protected $cloudStorage = null;

    /**
     * Set cloud storage
     *
     * @param Cloud|null $disk Cloud Storage Filesystem Disk
     *
     * @return self
     */
    public function setCloudStorage(?Cloud $disk)
    {
        $this->cloudStorage = $disk;

        return $this;
    }

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
    public function getCloudStorage(): ?Cloud
    {
        if (!$this->hasCloudStorage()) {
            $this->setCloudStorage($this->getDefaultCloudStorage());
        }
        return $this->cloudStorage;
    }

    /**
     * Check if cloud storage has been set
     *
     * @return bool True if cloud storage has been set, false if not
     */
    public function hasCloudStorage(): bool
    {
        return isset($this->cloudStorage);
    }

    /**
     * Get a default cloud storage value, if any is available
     *
     * @return Cloud|null A default cloud storage value or Null if no default value is available
     */
    public function getDefaultCloudStorage(): ?Cloud
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
