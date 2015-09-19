<?php namespace Aedart\Laravel\Helpers\Contracts\Bus;

use Illuminate\Contracts\Bus\Dispatcher;


/**
 * <h1>Bus Aware</h1>
 *
 * Components are able to specify and obtain a Command Bus Dispatcher
 *
 * @see \Illuminate\Contracts\Bus\Dispatcher
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface BusAware {

    /**
     * Set the given bus
     *
     * @param Dispatcher $dispatcher Instance of a Command Bus Dispatcher
     *
     * @return void
     */
    public function setBus(Dispatcher $dispatcher);

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
    public function getBus();

    /**
     * Get a default bus value, if any is available
     *
     * @return Dispatcher|null A default bus value or Null if no default value is available
     */
    public function getDefaultBus();

    /**
     * Check if bus has been set
     *
     * @return bool True if bus has been set, false if not
     */
    public function hasBus();

    /**
     * Check if a default bus is available or not
     *
     * @return bool True of a default bus is available, false if not
     */
    public function hasDefaultBus();
}