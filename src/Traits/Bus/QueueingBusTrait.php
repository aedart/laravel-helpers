<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Bus;

use Illuminate\Contracts\Bus\QueueingDispatcher;
use Illuminate\Support\Facades\Bus;

/**
 * @deprecated Use \Aedart\Support\Helpers\Bus\QueueingBusTrait, in aedart/athenaeum package
 *
 * QueueingBusTrait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Bus\QueueingBusAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Bus
 */
trait QueueingBusTrait
{
    /**
     * Bus Queueing Dispatcher instance
     *
     * @var QueueingDispatcher|null
     */
    protected $queueingBus = null;

    /**
     * Set queueing bus
     *
     * @param QueueingDispatcher|null $dispatcher Bus Queueing Dispatcher instance
     *
     * @return self
     */
    public function setQueueingBus(?QueueingDispatcher $dispatcher)
    {
        $this->queueingBus = $dispatcher;

        return $this;
    }

    /**
     * Get queueing bus
     *
     * If no queueing bus has been set, this method will
     * set and return a default queueing bus, if any such
     * value is available
     *
     * @see getDefaultQueueingBus()
     *
     * @return QueueingDispatcher|null queueing bus or null if none queueing bus has been set
     */
    public function getQueueingBus(): ?QueueingDispatcher
    {
        if (!$this->hasQueueingBus()) {
            $this->setQueueingBus($this->getDefaultQueueingBus());
        }
        return $this->queueingBus;
    }

    /**
     * Check if queueing bus has been set
     *
     * @return bool True if queueing bus has been set, false if not
     */
    public function hasQueueingBus(): bool
    {
        return isset($this->queueingBus);
    }

    /**
     * Get a default queueing bus value, if any is available
     *
     * @return QueueingDispatcher|null A default queueing bus value or Null if no default value is available
     */
    public function getDefaultQueueingBus(): ?QueueingDispatcher
    {
        return Bus::getFacadeRoot();
    }
}
