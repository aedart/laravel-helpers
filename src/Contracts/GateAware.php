<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Contracts\Auth\Access\Gate;


/**
 * <h1>Gate Aware</h1>
 *
 * Components are able to specify and obtain an Access Gate
 * utility component.
 *
 * @see \Illuminate\Contracts\Auth\Access\Gate
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface GateAware {

    /**
     * Set the given gate
     *
     * @param Gate $gate Instance of the Access Gate
     *
     * @return void
     */
    public function setGate(Gate $gate);

    /**
     * Get the given gate
     *
     * If no gate has been set, this method will
     * set and return a default gate, if any such
     * value is available
     *
     * @see getDefaultGate()
     *
     * @return Gate|null gate or null if none gate has been set
     */
    public function getGate();

    /**
     * Get a default gate value, if any is available
     *
     * @return Gate|null A default gate value or Null if no default value is available
     */
    public function getDefaultGate();

    /**
     * Check if gate has been set
     *
     * @return bool True if gate has been set, false if not
     */
    public function hasGate();

    /**
     * Check if a default gate is available or not
     *
     * @return bool True of a default gate is available, false if not
     */
    public function hasDefaultGate();
}