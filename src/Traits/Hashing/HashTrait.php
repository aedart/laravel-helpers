<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Hashing;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Hash;

/**
 * Hash Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Hashing\HashAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Hashing
 */
trait HashTrait
{
    /**
     * Hasher Instance
     *
     * @var Hasher|null
     */
    protected $hash = null;

    /**
     * Set hash
     *
     * @param Hasher|null $hasher Hasher Instance
     *
     * @return self
     */
    public function setHash(?Hasher $hasher)
    {
        $this->hash = $hasher;

        return $this;
    }

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
    public function getHash(): ?Hasher
    {
        if (!$this->hasHash()) {
            $this->setHash($this->getDefaultHash());
        }
        return $this->hash;
    }

    /**
     * Check if hash has been set
     *
     * @return bool True if hash has been set, false if not
     */
    public function hasHash(): bool
    {
        return isset($this->hash);
    }

    /**
     * Get a default hash value, if any is available
     *
     * @return Hasher|null A default hash value or Null if no default value is available
     */
    public function getDefaultHash(): ?Hasher
    {
        return Hash::getFacadeRoot();
    }
}