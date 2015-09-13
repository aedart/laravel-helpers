<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Filesystem\Filesystem;

/**
 * <h1>File Aware</h1>
 *
 * Components are able to specify and obtain Laravel's native Filesystem
 * utility component.
 *
 * <br />
 *
 * Please do review the `Storage` Facade, if you need to work with multiple
 * storage units.
 *
 * @see \Illuminate\Filesystem\Filesystem
 * @see \Illuminate\Support\Facades\Storage
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface FileAware {

    /**
     * Set the given file
     *
     * @param Filesystem $filesystem Instance of the filesystem utility
     *
     * @return void
     */
    public function setFile(Filesystem $filesystem);

    /**
     * Get the given file
     *
     * If no file has been set, this method will
     * set and return a default file, if any such
     * value is available
     *
     * @see getDefaultFile()
     *
     * @return Filesystem|null file or null if none file has been set
     */
    public function getFile();

    /**
     * Get a default file value, if any is available
     *
     * @return Filesystem|null A default file value or Null if no default value is available
     */
    public function getDefaultFile();

    /**
     * Check if file has been set
     *
     * @return bool True if file has been set, false if not
     */
    public function hasFile();

    /**
     * Check if a default file is available or not
     *
     * @return bool True of a default file is available, false if not
     */
    public function hasDefaultFile();
}