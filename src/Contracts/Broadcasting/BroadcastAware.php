<?php

namespace Aedart\Laravel\Helpers\Contracts\Broadcasting;

use Illuminate\Contracts\Broadcasting\Broadcaster;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Broadcasting\BroadcastAware, in aedart/athenaeum package
 *
 * Broadcast Aware
 *
 * @see \Illuminate\Contracts\Broadcasting\Broadcaster
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Broadcasting
 */
interface BroadcastAware
{
    /**
     * Set broadcast
     *
     * @param Broadcaster|null $broadcaster Broadcaster instance
     *
     * @return self
     */
    public function setBroadcast(?Broadcaster $broadcaster);

    /**
     * Get broadcast
     *
     * If no broadcast has been set, this method will
     * set and return a default broadcast, if any such
     * value is available
     *
     * @see getDefaultBroadcast()
     *
     * @return Broadcaster|null broadcast or null if none broadcast has been set
     */
    public function getBroadcast(): ?Broadcaster;

    /**
     * Check if broadcast has been set
     *
     * @return bool True if broadcast has been set, false if not
     */
    public function hasBroadcast(): bool;

    /**
     * Get a default broadcast value, if any is available
     *
     * @return Broadcaster|null A default broadcast value or Null if no default value is available
     */
    public function getDefaultBroadcast(): ?Broadcaster;
}
