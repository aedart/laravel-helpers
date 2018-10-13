<?php

namespace Aedart\Laravel\Helpers\Contracts\Console;

use Illuminate\Contracts\Console\Kernel;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Console\ArtisanAware, in aedart/athenaeum package
 *
 * Artisan Aware
 *
 * @see \Illuminate\Contracts\Console\Kernel
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Console
 */
interface ArtisanAware
{
    /**
     * Set artisan
     *
     * @param Kernel|null $kernel Artisan Kernel instance
     *
     * @return self
     */
    public function setArtisan(?Kernel $kernel);

    /**
     * Get artisan
     *
     * If no artisan has been set, this method will
     * set and return a default artisan, if any such
     * value is available
     *
     * @see getDefaultArtisan()
     *
     * @return Kernel|null artisan or null if none artisan has been set
     */
    public function getArtisan(): ?Kernel;

    /**
     * Check if artisan has been set
     *
     * @return bool True if artisan has been set, false if not
     */
    public function hasArtisan(): bool;

    /**
     * Get a default artisan value, if any is available
     *
     * @return Kernel|null A default artisan value or Null if no default value is available
     */
    public function getDefaultArtisan(): ?Kernel;
}
