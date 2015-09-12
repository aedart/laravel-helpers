<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Contracts\Console\Kernel;

/**
 * <h1>Artisan Aware</h1>
 *
 * Components are able to specify and obtain an artisan console kernel instance
 *
 * @see \Illuminate\Contracts\Console\Kernel
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface ArtisanAware {
    /**
     * Set the given artisan
     *
     * @param Kernel $artisan Instance of Artisan
     *
     * @return void
     */
    public function setArtisan(Kernel $artisan);

    /**
     * Get the given artisan
     *
     * If no artisan has been set, this method will
     * set and return a default artisan, if any such
     * value is available
     *
     * @see getDefaultArtisan()
     *
     * @return Kernel|null artisan or null if none artisan has been set
     */
    public function getArtisan();

    /**
     * Get a default artisan value, if any is available
     *
     * @return Kernel|null A default artisan value or Null if no default value is available
     */
    public function getDefaultArtisan();

    /**
     * Check if artisan has been set
     *
     * @return bool True if artisan has been set, false if not
     */
    public function hasArtisan();

    /**
     * Check if a default artisan is available or not
     *
     * @return bool True of a default artisan is available, false if not
     */
    public function hasDefaultArtisan();
}