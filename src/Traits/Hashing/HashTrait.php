<?php

namespace Aedart\Laravel\Helpers\Traits\Hashing;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Hash;

/**
 * <h1>Hash Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Hashing\HashAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait HashTrait
{
    /**
     * Instance of Hasher
     *
     * @var Hasher|null
     */
    protected $hash = null;

    /**
     * Set the given hash
     *
     * @param Hasher $hasher Instance of Hasher
     *
     * @return void
     */
    public function setHash(Hasher $hasher)
    {
        $this->hash = $hasher;
    }

    /**
     * Get the given hash
     *
     * If no hash has been set, this method will
     * set and return a default hash, if any such
     * value is available
     *
     * @see getDefaultHash()
     *
     * @return Hasher|null hash or null if none hash has been set
     */
    public function getHash()
    {
        if (!$this->hasHash() && $this->hasDefaultHash()) {
            $this->setHash($this->getDefaultHash());
        }
        return $this->hash;
    }

    /**
     * Get a default hash value, if any is available
     *
     * @return Hasher|null A default hash value or Null if no default value is available
     */
    public function getDefaultHash()
    {
        static $hash;
        return isset($hash) ? $hash : $hash = Hash::getFacadeRoot();
    }

    /**
     * Check if hash has been set
     *
     * @return bool True if hash has been set, false if not
     */
    public function hasHash()
    {
        return isset($this->hash);
    }

    /**
     * Check if a default hash is available or not
     *
     * @return bool True of a default hash is available, false if not
     */
    public function hasDefaultHash()
    {
        $default = $this->getDefaultHash();
        return isset($default);
    }
}