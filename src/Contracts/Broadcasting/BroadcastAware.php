<?php

namespace Aedart\Laravel\Helpers\Contracts\Broadcasting;

use Illuminate\Contracts\Broadcasting\Broadcaster;

/**
 * <h1>Broadcast Aware</h1>
 *
 * Component is aware of a broadcaster, which can also be specified
 *
 * @see \Illuminate\Contracts\Broadcasting\Broadcaster
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Broadcasting
 */
interface BroadcastAware
{
    /**
     * Set the given broadcast
     *
     * @param Broadcaster $broadcaster Instance of a Broadcaster
     *
     * @return void
     */
    public function setBroadcast(Broadcaster $broadcaster);

    /**
     * Get the given broadcast
     *
     * If no broadcast has been set, this method will
     * set and return a default broadcast, if any such
     * value is available
     *
     * @see getDefaultBroadcast()
     *
     * @return Broadcaster|null broadcast or null if none broadcast has been set
     */
    public function getBroadcast();

    /**
     * Get a default broadcast value, if any is available
     *
     * @return Broadcaster|null A default broadcast value or Null if no default value is available
     */
    public function getDefaultBroadcast();

    /**
     * Check if broadcast has been set
     *
     * @return bool True if broadcast has been set, false if not
     */
    public function hasBroadcast();

    /**
     * Check if a default broadcast is available or not
     *
     * @return bool True of a default broadcast is available, false if not
     */
    public function hasDefaultBroadcast();
}