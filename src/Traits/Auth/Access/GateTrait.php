<?php

namespace Aedart\Laravel\Helpers\Traits\Auth\Access;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as GateFacade;

/**
 * <h1>Gate Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\Access\GateAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait GateTrait
{
    /**
     * Instance of the Access Gate
     *
     * @var Gate|null
     */
    protected $gate = null;

    /**
     * Set the given gate
     *
     * @param Gate $gate Instance of the Access Gate
     *
     * @return void
     */
    public function setGate(Gate $gate)
    {
        $this->gate = $gate;
    }

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
    public function getGate()
    {
        if (!$this->hasGate() && $this->hasDefaultGate()) {
            $this->setGate($this->getDefaultGate());
        }
        return $this->gate;
    }

    /**
     * Get a default gate value, if any is available
     *
     * @return Gate|null A default gate value or Null if no default value is available
     */
    public function getDefaultGate()
    {
        return GateFacade::getFacadeRoot();
    }

    /**
     * Check if gate has been set
     *
     * @return bool True if gate has been set, false if not
     */
    public function hasGate()
    {
        return isset($this->gate);
    }

    /**
     * Check if a default gate is available or not
     *
     * @return bool True of a default gate is available, false if not
     */
    public function hasDefaultGate()
    {
        $default = $this->getDefaultGate();
        return isset($default);
    }
}