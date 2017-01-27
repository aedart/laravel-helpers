<?php

namespace Aedart\Laravel\Helpers\Traits\Queue;

use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Support\Facades\Queue;

/**
 * <h1>Queue Monitor Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Queue\QueueMonitorAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait QueueMonitorTrait
{
    /**
     * Instance of a Queue-Monitor
     *
     * @var Monitor|null
     */
    protected $queueMonitor = null;

    /**
     * Set the given queue monitor
     *
     * @param Monitor $monitor Instance of a Queue-Monitor
     *
     * @return void
     */
    public function setQueueMonitor(Monitor $monitor)
    {
        $this->queueMonitor = $monitor;
    }

    /**
     * Get the given queue monitor
     *
     * If no queue monitor has been set, this method will
     * set and return a default queue monitor, if any such
     * value is available
     *
     * @see getDefaultQueueMonitor()
     *
     * @return Monitor|null queue monitor or null if none queue monitor has been set
     */
    public function getQueueMonitor()
    {
        if (!$this->hasQueueMonitor() && $this->hasDefaultQueueMonitor()) {
            $this->setQueueMonitor($this->getDefaultQueueMonitor());
        }
        return $this->queueMonitor;
    }

    /**
     * Get a default queue monitor value, if any is available
     *
     * @return Monitor|null A default queue monitor value or Null if no default value is available
     */
    public function getDefaultQueueMonitor()
    {
        return Queue::getFacadeRoot();
    }

    /**
     * Check if queue monitor has been set
     *
     * @return bool True if queue monitor has been set, false if not
     */
    public function hasQueueMonitor()
    {
        if (!is_null($this->queueMonitor)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default queue monitor is available or not
     *
     * @return bool True of a default queue monitor is available, false if not
     */
    public function hasDefaultQueueMonitor()
    {
        if (!is_null($this->getDefaultQueueMonitor())) {
            return true;
        }
        return false;
    }
}