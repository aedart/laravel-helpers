<?php

namespace Aedart\Laravel\Helpers\Traits\Events;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Event;

/**
 * <h1>Event Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Events\EventAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait EventTrait
{
    /**
     * Instance of a event dispatcher
     *
     * @var Dispatcher|null
     */
    protected $event = null;

    /**
     * Set the given event
     *
     * @param Dispatcher $dispatcher Instance of a event dispatcher
     *
     * @return void
     */
    public function setEvent(Dispatcher $dispatcher)
    {
        $this->event = $dispatcher;
    }

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
    public function getEvent()
    {
        if (!$this->hasEvent() && $this->hasDefaultEvent()) {
            $this->setEvent($this->getDefaultEvent());
        }
        return $this->event;
    }

    /**
     * Get a default event value, if any is available
     *
     * @return Dispatcher|null A default event value or Null if no default value is available
     */
    public function getDefaultEvent()
    {
        return Event::getFacadeRoot();
    }

    /**
     * Check if event has been set
     *
     * @return bool True if event has been set, false if not
     */
    public function hasEvent()
    {
        return isset($this->event);
    }

    /**
     * Check if a default event is available or not
     *
     * @return bool True of a default event is available, false if not
     */
    public function hasDefaultEvent()
    {
        $default = $this->getDefaultEvent();
        return isset($default);
    }
}