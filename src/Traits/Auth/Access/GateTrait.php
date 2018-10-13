<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Auth\Access;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as GateFacade;

/**
 * @deprecated Use \Aedart\Support\Helpers\Auth\Access\GateTrait, in aedart/athenaeum package
 *
 * GateTrait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\Access\GateAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth\Access
 */
trait GateTrait
{
    /**
     * Access Gate instance
     *
     * @var Gate|null
     */
    protected $gate = null;

    /**
     * Set gate
     *
     * @param Gate|null $gate Access Gate instance
     *
     * @return self
     */
    public function setGate(?Gate $gate)
    {
        $this->gate = $gate;

        return $this;
    }

    /**
     * Get gate
     *
     * If no gate has been set, this method will
     * set and return a default gate, if any such
     * value is available
     *
     * @see getDefaultGate()
     *
     * @return Gate|null gate or null if none gate has been set
     */
    public function getGate(): ?Gate
    {
        if (!$this->hasGate()) {
            $this->setGate($this->getDefaultGate());
        }
        return $this->gate;
    }

    /**
     * Check if gate has been set
     *
     * @return bool True if gate has been set, false if not
     */
    public function hasGate(): bool
    {
        return isset($this->gate);
    }

    /**
     * Get a default gate value, if any is available
     *
     * @return Gate|null A default gate value or Null if no default value is available
     */
    public function getDefaultGate(): ?Gate
    {
        return GateFacade::getFacadeRoot();
    }
}
