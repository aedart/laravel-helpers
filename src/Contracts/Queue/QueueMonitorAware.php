<?php

namespace Aedart\Laravel\Helpers\Contracts\Queue;

use Illuminate\Contracts\Queue\Monitor;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Queue\QueueMonitorAware, in aedart/athenaeum package
 *
 * Queue Monitor Aware
 *
 * @see \Illuminate\Contracts\Queue\Monitor
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Queue
 */
interface QueueMonitorAware
{
    /**
     * Set queue monitor
     *
     * @param Monitor|null $monitor Queue Monitor Instance
     *
     * @return self
     */
    public function setQueueMonitor(?Monitor $monitor);

    /**
     * Get queue monitor
     *
     * If no queue monitor has been set, this method will
     * set and return a default queue monitor, if any such
     * value is available
     *
     * @see getDefaultQueueMonitor()
     *
     * @return Monitor|null queue monitor or null if none queue monitor has been set
     */
    public function getQueueMonitor(): ?Monitor;

    /**
     * Check if queue monitor has been set
     *
     * @return bool True if queue monitor has been set, false if not
     */
    public function hasQueueMonitor(): bool;

    /**
     * Get a default queue monitor value, if any is available
     *
     * @return Monitor|null A default queue monitor value or Null if no default value is available
     */
    public function getDefaultQueueMonitor(): ?Monitor;
}
