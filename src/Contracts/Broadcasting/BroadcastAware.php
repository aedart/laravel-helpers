<?php
namespace Aedart\Laravel\Helpers\Contracts\Broadcasting;

use Illuminate\Contracts\Broadcasting\Factory;

/**
 * <h1>Broadcast Aware</h1>
 *
 * Components are able to specify and obtain a broadcast factory
 *
 * @see \Illuminate\Contracts\Broadcasting\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Broadcasting
 */
interface BroadcastAware
{
    /**
     * Set the given broadcast
     *
     * @param Factory $factory Instance of the broadcast factory
     *
     * @return void
     */
    public function setBroadcast(Factory $factory);

    /**
     * Get the given broadcast
     *
     * If no broadcast has been set, this method will
     * set and return a default broadcast, if any such
     * value is available
     *
     * @see getDefaultBroadcast()
     *
     * @return Factory|null broadcast or null if none broadcast has been set
     */
    public function getBroadcast();

    /**
     * Get a default broadcast value, if any is available
     *
     * @return Factory|null A default broadcast value or Null if no default value is available
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