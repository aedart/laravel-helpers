<?php

namespace Aedart\Laravel\Helpers\Contracts\Events;

use Illuminate\Contracts\Events\Dispatcher;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Events\EventAware, in aedart/athenaeum package
 *
 * Event Dispatcher Aware
 *
 * @see \Illuminate\Contracts\Events\Dispatcher
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Events
 */
interface EventAware
{
    /**
     * Set event
     *
     * @param Dispatcher|null $dispatcher Event Dispatcher Instance
     *
     * @return self
     */
    public function setEvent(?Dispatcher $dispatcher);

    /**
     * Get event
     *
     * If no event has been set, this method will
     * set and return a default event, if any such
     * value is available
     *
     * @see getDefaultEvent()
     *
     * @return Dispatcher|null event or null if none event has been set
     */
    public function getEvent(): ?Dispatcher;

    /**
     * Check if event has been set
     *
     * @return bool True if event has been set, false if not
     */
    public function hasEvent(): bool;

    /**
     * Get a default event value, if any is available
     *
     * @return Dispatcher|null A default event value or Null if no default value is available
     */
    public function getDefaultEvent(): ?Dispatcher;
}
