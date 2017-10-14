<?php

namespace Aedart\Laravel\Helpers\Contracts\Hashing;

use Illuminate\Contracts\Hashing\Hasher;

/**
 * Hash Aware
 *
 * @see \Illuminate\Contracts\Hashing\Hasher
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Hashing
 */
interface HashAware
{
    /**
     * Set hash
     *
     * @param Hasher|null $hasher Hasher Instance
     *
     * @return self
     */
    public function setHash(?Hasher $hasher);

    /**
     * Get hash
     *
     * If no hash has been set, this method will
     * set and return a default hash, if any such
     * value is available
     *
     * @see getDefaultHash()
     *
     * @return Hasher|null hash or null if none hash has been set
     */
    public function getHash(): ?Hasher;

    /**
     * Check if hash has been set
     *
     * @return bool True if hash has been set, false if not
     */
    public function hasHash(): bool;

    /**
     * Get a default hash value, if any is available
     *
     * @return Hasher|null A default hash value or Null if no default value is available
     */
    public function getDefaultHash(): ?Hasher;
}