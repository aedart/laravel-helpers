<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Filesystem;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

/**
 * @deprecated Use \Aedart\Support\Helpers\Filesystem\FileTrait, in aedart/athenaeum package
 *
 * File Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Filesystem\FileAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Filesystem
 */
trait FileTrait
{
    /**
     * Filesystem Instance
     *
     * @var Filesystem|null
     */
    protected $file = null;

    /**
     * Set file
     *
     * @param Filesystem|null $filesystem Filesystem Instance
     *
     * @return self
     */
    public function setFile(?Filesystem $filesystem)
    {
        $this->file = $filesystem;

        return $this;
    }

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
    public function getFile(): ?Filesystem
    {
        if (!$this->hasFile()) {
            $this->setFile($this->getDefaultFile());
        }
        return $this->file;
    }

    /**
     * Check if file has been set
     *
     * @return bool True if file has been set, false if not
     */
    public function hasFile(): bool
    {
        return isset($this->file);
    }

    /**
     * Get a default file value, if any is available
     *
     * @return Filesystem|null A default file value or Null if no default value is available
     */
    public function getDefaultFile(): ?Filesystem
    {
        return File::getFacadeRoot();
    }
}
