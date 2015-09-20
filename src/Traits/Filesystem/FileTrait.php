<?php namespace Aedart\Laravel\Helpers\Traits\Filesystem;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

/**
 * <h1>File Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Filesystem\FileAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait FileTrait {

    /**
     * Instance of the filesystem utility
     *
     * @var Filesystem|null
     */
    protected $file = null;

    /**
     * Set the given file
     *
     * @param Filesystem $filesystem Instance of the filesystem utility
     *
     * @return void
     */
    public function setFile(Filesystem $filesystem) {
        $this->file = $filesystem;
    }

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
    public function getFile() {
        if (!$this->hasFile() && $this->hasDefaultFile()) {
            $this->setFile($this->getDefaultFile());
        }
        return $this->file;
    }

    /**
     * Get a default file value, if any is available
     *
     * @return Filesystem|null A default file value or Null if no default value is available
     */
    public function getDefaultFile() {
        return File::getFacadeRoot();
    }

    /**
     * Check if file has been set
     *
     * @return bool True if file has been set, false if not
     */
    public function hasFile() {
        if (!is_null($this->file)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default file is available or not
     *
     * @return bool True of a default file is available, false if not
     */
    public function hasDefaultFile() {
        if (!is_null($this->getDefaultFile())) {
            return true;
        }
        return false;
    }
}