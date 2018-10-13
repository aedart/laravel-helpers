<?php

namespace Aedart\Laravel\Helpers\Contracts\Filesystem;

use Illuminate\Filesystem\Filesystem;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Filesystem\FileAware, in aedart/athenaeum package
 *
 * File Aware
 *
 * @see \Illuminate\Filesystem\Filesystem
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Filesystem
 */
interface FileAware
{
    /**
     * Set file
     *
     * @param Filesystem|null $filesystem Filesystem Instance
     *
     * @return self
     */
    public function setFile(?Filesystem $filesystem);

    /**
     * Get file
     *
     * If no file has been set, this method will
     * set and return a default file, if any such
     * value is available
     *
     * @see getDefaultFile()
     *
     * @return Filesystem|null file or null if none file has been set
     */
    public function getFile(): ?Filesystem;

    /**
     * Check if file has been set
     *
     * @return bool True if file has been set, false if not
     */
    public function hasFile(): bool;

    /**
     * Get a default file value, if any is available
     *
     * @return Filesystem|null A default file value or Null if no default value is available
     */
    public function getDefaultFile(): ?Filesystem;
}
