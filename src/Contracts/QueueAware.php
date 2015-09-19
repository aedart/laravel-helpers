<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Contracts\Queue\Queue;

/**
 * <h1>Queue Aware</h1>
 *
 * Components are able to specify and obtain a queue
 * utility component.
 *
 * @see \Illuminate\Contracts\Queue\Queue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface QueueAware {

    /**
     * Set the given queue
     *
     * @param Queue $queue Instance of a queue
     *
     * @return void
     */
    public function setQueue(Queue $queue);

    /**
     * Get the given queue
     *
     * If no queue has been set, this method will
     * set and return a default queue, if any such
     * value is available
     *
     * @see getDefaultQueue()
     *
     * @return Queue|null queue or null if none queue has been set
     */
    public function getQueue();

    /**
     * Get a default queue value, if any is available
     *
     * @return Queue|null A default queue value or Null if no default value is available
     */
    public function getDefaultQueue();

    /**
     * Check if queue has been set
     *
     * @return bool True if queue has been set, false if not
     */
    public function hasQueue();

    /**
     * Check if a default queue is available or not
     *
     * @return bool True of a default queue is available, false if not
     */
    public function hasDefaultQueue();
}