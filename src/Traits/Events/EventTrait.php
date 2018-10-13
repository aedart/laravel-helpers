<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Events;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Event;

/**
 * @deprecated Use \Aedart\Support\Helpers\Events\EventTrait, in aedart/athenaeum package
 *
 * Event Dispatcher Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Events\EventAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Events
 */
trait EventTrait
{
    /**
     * Event Dispatcher Instance
     *
     * @var Dispatcher|null
     */
    protected $event = null;

    /**
     * Set event
     *
     * @param Dispatcher|null $dispatcher Event Dispatcher Instance
     *
     * @return self
     */
    public function setEvent(?Dispatcher $dispatcher)
    {
        $this->event = $dispatcher;

        return $this;
    }

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
    public function getEvent(): ?Dispatcher
    {
        if (!$this->hasEvent()) {
            $this->setEvent($this->getDefaultEvent());
        }
        return $this->event;
    }

    /**
     * Check if event has been set
     *
     * @return bool True if event has been set, false if not
     */
    public function hasEvent(): bool
    {
        return isset($this->event);
    }

    /**
     * Get a default event value, if any is available
     *
     * @return Dispatcher|null A default event value or Null if no default value is available
     */
    public function getDefaultEvent(): ?Dispatcher
    {
        return Event::getFacadeRoot();
    }
}
