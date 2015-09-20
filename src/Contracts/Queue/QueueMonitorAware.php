<?php namespace Aedart\Laravel\Helpers\Contracts\Queue;

use Illuminate\Contracts\Queue\Monitor;

/**
 * <h1>Queue Manager Aware</h1>
 *
 * Components are able to specify and obtain a Queue-Monitor
 * utility component.
 *
 * @see \Illuminate\Contracts\Queue\Monitor
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface QueueMonitorAware {

    /**
     * Set the given queue monitor
     *
     * @param Monitor $monitor Instance of a Queue-Monitor
     *
     * @return void
     */
    public function setQueueMonitor(Monitor $monitor);

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
    public function getQueueMonitor();

    /**
     * Get a default queue monitor value, if any is available
     *
     * @return Monitor|null A default queue monitor value or Null if no default value is available
     */
    public function getDefaultQueueMonitor();

    /**
     * Check if queue monitor has been set
     *
     * @return bool True if queue monitor has been set, false if not
     */
    public function hasQueueMonitor();

    /**
     * Check if a default queue monitor is available or not
     *
     * @return bool True of a default queue monitor is available, false if not
     */
    public function hasDefaultQueueMonitor();
}