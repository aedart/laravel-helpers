<?php namespace Aedart\Laravel\Helpers\Contracts\Events;

use Illuminate\Contracts\Events\Dispatcher;

/**
 * <h1>Event Aware</h1>
 *
 * Components are able to specify and obtain an event dispatcher
 *
 * @see \Illuminate\Contracts\Events\Dispatcher
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface EventAware {

    /**
     * Set the given event
     *
     * @param Dispatcher $dispatcher Instance of a event dispatcher
     *
     * @return void
     */
    public function setEvent(Dispatcher $dispatcher);

    /**
     * Get the given event
     *
     * If no event has been set, this method will
     * set and return a default event, if any such
     * value is available
     *
     * @see getDefaultEvent()
     *
     * @return Dispatcher|null event or null if none event has been set
     */
    public function getEvent();

    /**
     * Get a default event value, if any is available
     *
     * @return Dispatcher|null A default event value or Null if no default value is available
     */
    public function getDefaultEvent();

    /**
     * Check if event has been set
     *
     * @return bool True if event has been set, false if not
     */
    public function hasEvent();

    /**
     * Check if a default event is available or not
     *
     * @return bool True of a default event is available, false if not
     */
    public function hasDefaultEvent();
}