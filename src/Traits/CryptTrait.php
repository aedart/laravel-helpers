<?php namespace Aedart\Facade\Helpers\Traits;

use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Support\Facades\Crypt;

/**
 * <h1>Crypt Trait</h1>
 *
 * @see \Aedart\Facade\Helpers\Contracts\CryptAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait CryptTrait {

    /**
     * Instance of an encrypter
     *
     * @var Encrypter|null
     */
    protected $crypt = null;

    /**
     * Set the given crypt
     *
     * @param Encrypter $encrypter Instance of an encrypter
     *
     * @return void
     */
    public function setCrypt(Encrypter $encrypter) {
        $this->crypt = $encrypter;
    }

    /**
     * Get the given crypt
     *
     * If no crypt has been set, this method will
     * set and return a default crypt, if any such
     * value is available
     *
     * @see getDefaultCrypt()
     *
     * @return Encrypter|null crypt or null if none crypt has been set
     */
    public function getCrypt() {
        if (!$this->hasCrypt() && $this->hasDefaultCrypt()) {
            $this->setCrypt($this->getDefaultCrypt());
        }
        return $this->crypt;
    }

    /**
     * Get a default crypt value, if any is available
     *
     * @return Encrypter|null A default crypt value or Null if no default value is available
     */
    public function getDefaultCrypt() {
        return Crypt::getFacadeRoot();
    }

    /**
     * Check if crypt has been set
     *
     * @return bool True if crypt has been set, false if not
     */
    public function hasCrypt() {
        if (!is_null($this->crypt)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default crypt is available or not
     *
     * @return bool True of a default crypt is available, false if not
     */
    public function hasDefaultCrypt() {
        if (!is_null($this->getDefaultCrypt())) {
            return true;
        }
        return false;
    }
}