<?php namespace Aedart\Laravel\Helpers\Traits\Filesystem;

use Aedart\Laravel\Helpers\Contracts\Filesystem\StorageFactoryAware;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * <h1>Storage Factory Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Filesystem\StorageFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Filesystem
 */
trait StorageFactoryTrait {

    /**
     * Instance of a Filesystem Factory - cloud storage
     *
     * @var Factory|null
     */
    protected $storageFactory = null;

    /**
     * Set the given storage factory
     *
     * @param Factory $factory Instance of a Filesystem Factory - cloud storage
     *
     * @return void
     */
    public function setStorageFactory(Factory $factory) {
        $this->storageFactory = $factory;
    }

    /**
     * Get the given storage factory
     *
     * If no storage factory has been set, this method will
     * set and return a default storage factory, if any such
     * value is available
     *
     * @see getDefaultStorageFactory()
     *
     * @return Factory|null storage factory or null if none storage factory has been set
     */
    public function getStorageFactory() {
        if (!$this->hasStorageFactory() && $this->hasDefaultStorageFactory()) {
            $this->setStorageFactory($this->getDefaultStorageFactory());
        }
        return $this->storageFactory;
    }

    /**
     * Get a default storage factory value, if any is available
     *
     * @return Factory|null A default storage factory value or Null if no default value is available
     */
    public function getDefaultStorageFactory() {
        return Storage::getFacadeRoot();
    }

    /**
     * Check if storage factory has been set
     *
     * @return bool True if storage factory has been set, false if not
     */
    public function hasStorageFactory() {
        if (!is_null($this->storageFactory)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default storage factory is available or not
     *
     * @return bool True of a default storage factory is available, false if not
     */
    public function hasDefaultStorageFactory() {
        if (!is_null($this->getDefaultStorageFactory())) {
            return true;
        }
        return false;
    }
}