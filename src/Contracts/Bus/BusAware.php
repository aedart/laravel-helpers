<?php

namespace Aedart\Laravel\Helpers\Contracts\Bus;

use Illuminate\Contracts\Bus\Dispatcher;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Bus\BusAware, in aedart/athenaeum package
 *
 * Bus Aware
 *
 * @see \Illuminate\Contracts\Bus\Dispatcher
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Bus
 */
interface BusAware
{
    /**
     * Set bus
     *
     * @param Dispatcher|null $dispatcher Bus Dispatcher instance
     *
     * @return self
     */
    public function setBus(?Dispatcher $dispatcher);

    /**
     * Get bus
     *
     * If no bus has been set, this method will
     * set and return a default bus, if any such
     * value is available
     *
     * @see getDefaultBus()
     *
     * @return Dispatcher|null bus or null if none bus has been set
     */
    public function getBus(): ?Dispatcher;

    /**
     * Check if bus has been set
     *
     * @return bool True if bus has been set, false if not
     */
    public function hasBus(): bool;

    /**
     * Get a default bus value, if any is available
     *
     * @return Dispatcher|null A default bus value or Null if no default value is available
     */
    public function getDefaultBus(): ?Dispatcher;
}
