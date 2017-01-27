<?php

namespace Aedart\Laravel\Helpers\Contracts\Encryption;

use Illuminate\Contracts\Encryption\Encrypter;

/**
 * <h1>Crypt Aware</h1>
 *
 * Components are able to specify and obtain an encrypter
 *
 * @see \Illuminate\Contracts\Encryption\Encrypter
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface CryptAware
{
    /**
     * Set the given crypt
     *
     * @param Encrypter $encrypter Instance of an encrypter
     *
     * @return void
     */
    public function setCrypt(Encrypter $encrypter);

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
    public function getCrypt();

    /**
     * Get a default crypt value, if any is available
     *
     * @return Encrypter|null A default crypt value or Null if no default value is available
     */
    public function getDefaultCrypt();

    /**
     * Check if crypt has been set
     *
     * @return bool True if crypt has been set, false if not
     */
    public function hasCrypt();

    /**
     * Check if a default crypt is available or not
     *
     * @return bool True of a default crypt is available, false if not
     */
    public function hasDefaultCrypt();
}