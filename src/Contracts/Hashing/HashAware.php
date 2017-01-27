<?php

namespace Aedart\Laravel\Helpers\Contracts\Hashing;

use Illuminate\Contracts\Hashing\Hasher;

/**
 * <h1>Hash Aware</h1>
 *
 * Components are able to specify and obtain a Hashing
 * utility component.
 *
 * @see \Illuminate\Contracts\Hashing\Hasher
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface HashAware
{
    /**
     * Set the given hash
     *
     * @param Hasher $hasher Instance of Hasher
     *
     * @return void
     */
    public function setHash(Hasher $hasher);

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
    public function getHash();

    /**
     * Get a default hash value, if any is available
     *
     * @return Hasher|null A default hash value or Null if no default value is available
     */
    public function getDefaultHash();

    /**
     * Check if hash has been set
     *
     * @return bool True if hash has been set, false if not
     */
    public function hasHash();

    /**
     * Check if a default hash is available or not
     *
     * @return bool True of a default hash is available, false if not
     */
    public function hasDefaultHash();
}