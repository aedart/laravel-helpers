<?php

namespace Aedart\Laravel\Helpers\Contracts\Broadcasting;

use Illuminate\Contracts\Broadcasting\Factory;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Broadcasting\BroadcastFactoryAware, in aedart/athenaeum package
 *
 * Broadcast Factory Aware
 *
 * @see \Illuminate\Contracts\Broadcasting\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Broadcasting
 */
interface BroadcastFactoryAware
{
    /**
     * Set broadcast factory
     *
     * @param Factory|null $factory Broadcast Factory instance
     *
     * @return self
     */
    public function setBroadcastFactory(?Factory $factory);

    /**
     * Get broadcast factory
     *
     * If no broadcast factory has been set, this method will
     * set and return a default broadcast factory, if any such
     * value is available
     *
     * @see getDefaultBroadcastFactory()
     *
     * @return Factory|null broadcast factory or null if none broadcast factory has been set
     */
    public function getBroadcastFactory(): ?Factory;

    /**
     * Check if broadcast factory has been set
     *
     * @return bool True if broadcast factory has been set, false if not
     */
    public function hasBroadcastFactory(): bool;

    /**
     * Get a default broadcast factory value, if any is available
     *
     * @return Factory|null A default broadcast factory value or Null if no default value is available
     */
    public function getDefaultBroadcastFactory(): ?Factory;
}
