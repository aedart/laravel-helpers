<?php namespace Aedart\Laravel\Helpers\Traits\Console;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;

/**
 * <h1>Artisan Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Console\ArtisanAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait ArtisanTrait {

    /**
     * Instance of Artisan
     *
     * @var Kernel|null
     */
    protected $artisan = null;

    /**
     * Set the given artisan
     *
     * @param Kernel $artisan Instance of Artisan
     *
     * @return void
     */
    public function setArtisan(Kernel $artisan) {
        $this->artisan = $artisan;
    }

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
    public function getArtisan() {
        if (!$this->hasArtisan() && $this->hasDefaultArtisan()) {
            $this->setArtisan($this->getDefaultArtisan());
        }
        return $this->artisan;
    }

    /**
     * Get a default artisan value, if any is available
     *
     * @return Kernel|null A default artisan value or Null if no default value is available
     */
    public function getDefaultArtisan() {
        return Artisan::getFacadeRoot();
    }

    /**
     * Check if artisan has been set
     *
     * @return bool True if artisan has been set, false if not
     */
    public function hasArtisan() {
        if (!is_null($this->artisan)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default artisan is available or not
     *
     * @return bool True of a default artisan is available, false if not
     */
    public function hasDefaultArtisan() {
        if (!is_null($this->getDefaultArtisan())) {
            return true;
        }
        return false;
    }

}