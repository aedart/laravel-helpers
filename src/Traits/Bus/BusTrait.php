<?php

namespace Aedart\Laravel\Helpers\Traits\Bus;

use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\Bus;

/**
 * <h1>Bus Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Bus\BusAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait BusTrait
{
    /**
     * Instance of a Command Bus Dispatcher
     *
     * @var Dispatcher|null
     */
    protected $bus = null;

    /**
     * Set the given bus
     *
     * @param Dispatcher $dispatcher Instance of a Command Bus Dispatcher
     *
     * @return void
     */
    public function setBus(Dispatcher $dispatcher)
    {
        $this->bus = $dispatcher;
    }

    /**
     * Get the given bus
     *
     * If no bus has been set, this method will
     * set and return a default bus, if any such
     * value is available
     *
     * @see getDefaultBus()
     *
     * @return Dispatcher|null bus or null if none bus has been set
     */
    public function getBus()
    {
        if (!$this->hasBus() && $this->hasDefaultBus()) {
            $this->setBus($this->getDefaultBus());
        }
        return $this->bus;
    }

    /**
     * Get a default bus value, if any is available
     *
     * @return Dispatcher|null A default bus value or Null if no default value is available
     */
    public function getDefaultBus()
    {
        static $bus;
        return isset($bus) ? $bus : $bus = Bus::getFacadeRoot();
    }

    /**
     * Check if bus has been set
     *
     * @return bool True if bus has been set, false if not
     */
    public function hasBus()
    {
        return isset($this->bus);
    }

    /**
     * Check if a default bus is available or not
     *
     * @return bool True of a default bus is available, false if not
     */
    public function hasDefaultBus()
    {
        $default = $this->getDefaultBus();
        return isset($default);
    }
}