<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Encryption;

use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Support\Facades\Crypt;

/**
 * @deprecated Use \Aedart\Support\Helpers\Encryption\CryptTrait, in aedart/athenaeum package
 *
 * Crypt Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Encryption\CryptAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Encryption
 */
trait CryptTrait
{
    /**
     * Encrypter Instance
     *
     * @var Encrypter|null
     */
    protected $crypt = null;

    /**
     * Set crypt
     *
     * @param Encrypter|null $encrypter Encrypter Instance
     *
     * @return self
     */
    public function setCrypt(?Encrypter $encrypter)
    {
        $this->crypt = $encrypter;

        return $this;
    }

    /**
     * Get crypt
     *
     * If no crypt has been set, this method will
     * set and return a default crypt, if any such
     * value is available
     *
     * @see getDefaultCrypt()
     *
     * @return Encrypter|null crypt or null if none crypt has been set
     */
    public function getCrypt(): ?Encrypter
    {
        if (!$this->hasCrypt()) {
            $this->setCrypt($this->getDefaultCrypt());
        }
        return $this->crypt;
    }

    /**
     * Check if crypt has been set
     *
     * @return bool True if crypt has been set, false if not
     */
    public function hasCrypt(): bool
    {
        return isset($this->crypt);
    }

    /**
     * Get a default crypt value, if any is available
     *
     * @return Encrypter|null A default crypt value or Null if no default value is available
     */
    public function getDefaultCrypt(): ?Encrypter
    {
        return Crypt::getFacadeRoot();
    }
}
