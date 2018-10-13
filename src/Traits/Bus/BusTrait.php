<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Bus;

use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\Bus;

/**
 * @deprecated Use \Aedart\Support\Helpers\Bus\BusTrait, in aedart/athenaeum package
 *
 * BusTrait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Bus\BusAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Bus
 */
trait BusTrait
{
    /**
     * Bus Dispatcher instance
     *
     * @var Dispatcher|null
     */
    protected $bus = null;

    /**
     * Set bus
     *
     * @param Dispatcher|null $dispatcher Bus Dispatcher instance
     *
     * @return self
     */
    public function setBus(?Dispatcher $dispatcher)
    {
        $this->bus = $dispatcher;

        return $this;
    }

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
    public function getBus(): ?Dispatcher
    {
        if (!$this->hasBus()) {
            $this->setBus($this->getDefaultBus());
        }
        return $this->bus;
    }

    /**
     * Check if bus has been set
     *
     * @return bool True if bus has been set, false if not
     */
    public function hasBus(): bool
    {
        return isset($this->bus);
    }

    /**
     * Get a default bus value, if any is available
     *
     * @return Dispatcher|null A default bus value or Null if no default value is available
     */
    public function getDefaultBus(): ?Dispatcher
    {
        return Bus::getFacadeRoot();
    }
}
