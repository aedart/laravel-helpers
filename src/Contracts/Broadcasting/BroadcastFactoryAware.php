<?php

namespace Aedart\Laravel\Helpers\Contracts\Broadcasting;

use Illuminate\Contracts\Broadcasting\Factory;

/**
 * <h1>Broadcast Factory Aware</h1>
 *
 * Component is aware of a broadcasting manager / factory.
 *
 * @see \Illuminate\Contracts\Broadcasting\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Broadcasting
 */
interface BroadcastFactoryAware
{
    /**
     * Set the given broadcast factory
     *
     * @param Factory $factory Instance of a Broadcast Factory
     *
     * @return void
     */
    public function setBroadcastFactory(Factory $factory);

    /**
     * Get the given broadcast factory
     *
     * If no broadcast factory has been set, this method will
     * set and return a default broadcast factory, if any such
     * value is available
     *
     * @see getDefaultBroadcastFactory()
     *
     * @return Factory|null broadcast factory or null if none broadcast factory has been set
     */
    public function getBroadcastFactory();

    /**
     * Get a default broadcast factory value, if any is available
     *
     * @return Factory|null A default broadcast factory value or Null if no default value is available
     */
    public function getDefaultBroadcastFactory();

    /**
     * Check if broadcast factory has been set
     *
     * @return bool True if broadcast factory has been set, false if not
     */
    public function hasBroadcastFactory();

    /**
     * Check if a default broadcast factory is available or not
     *
     * @return bool True of a default broadcast factory is available, false if not
     */
    public function hasDefaultBroadcastFactory();
}