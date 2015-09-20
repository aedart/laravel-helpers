<?php namespace Aedart\Laravel\Helpers\Contracts\Filesystem;

use Illuminate\Contracts\Filesystem\Factory;

/**
 * <h1>Storage Factory Aware</h1>
 *
 * Components are able to specify and obtain a Filesystem Factory
 *
 * @see \Illuminate\Contracts\Filesystem\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Filesystem
 */
interface StorageFactoryAware {

    /**
     * Set the given storage factory
     *
     * @param Factory $factory Instance of a Filesystem Factory - cloud storage
     *
     * @return void
     */
    public function setStorageFactory(Factory $factory);

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
    public function getStorageFactory();

    /**
     * Get a default storage factory value, if any is available
     *
     * @return Factory|null A default storage factory value or Null if no default value is available
     */
    public function getDefaultStorageFactory();

    /**
     * Check if storage factory has been set
     *
     * @return bool True if storage factory has been set, false if not
     */
    public function hasStorageFactory();

    /**
     * Check if a default storage factory is available or not
     *
     * @return bool True of a default storage factory is available, false if not
     */
    public function hasDefaultStorageFactory();
}