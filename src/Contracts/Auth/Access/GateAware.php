<?php

namespace Aedart\Laravel\Helpers\Contracts\Auth\Access;

use Illuminate\Contracts\Auth\Access\Gate;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Auth\Access\GateAware, in aedart/athenaeum package
 *
 * Gate Aware
 *
 * @see \Illuminate\Contracts\Auth\Access\Gate
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Auth\Access
 */
interface GateAware
{
    /**
     * Set gate
     *
     * @param Gate|null $gate Access Gate instance
     *
     * @return self
     */
    public function setGate(?Gate $gate);

    /**
     * Get gate
     *
     * If no gate has been set, this method will
     * set and return a default gate, if any such
     * value is available
     *
     * @see getDefaultGate()
     *
     * @return Gate|null gate or null if none gate has been set
     */
    public function getGate(): ?Gate;

    /**
     * Check if gate has been set
     *
     * @return bool True if gate has been set, false if not
     */
    public function hasGate(): bool;

    /**
     * Get a default gate value, if any is available
     *
     * @return Gate|null A default gate value or Null if no default value is available
     */
    public function getDefaultGate(): ?Gate;
}
