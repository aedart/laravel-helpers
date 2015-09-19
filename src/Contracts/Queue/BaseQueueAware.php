<?php namespace Aedart\Laravel\Helpers\Contracts\Queue;

use Illuminate\Queue\Queue;

/**
 * <h1>Base Queue Aware</h1>
 *
 * Components are able to specify and obtain a Base Queue instance
 * utility component.
 *
 * @see \Illuminate\Queue\Queue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface BaseQueueAware {

    /**
     * Set the given base queue
     *
     * @param Queue $queue Instance of a base queue
     *
     * @return void
     */
    public function setBaseQueue(Queue $queue);

    /**
     * Get the given base queue
     *
     * If no base queue has been set, this method will
     * set and return a default base queue, if any such
     * value is available
     *
     * @see getDefaultBaseQueue()
     *
     * @return Queue|null base queue or null if none base queue has been set
     */
    public function getBaseQueue();

    /**
     * Get a default base queue value, if any is available
     *
     * @return Queue|null A default base queue value or Null if no default value is available
     */
    public function getDefaultBaseQueue();

    /**
     * Check if base queue has been set
     *
     * @return bool True if base queue has been set, false if not
     */
    public function hasBaseQueue();

    /**
     * Check if a default base queue is available or not
     *
     * @return bool True of a default base queue is available, false if not
     */
    public function hasDefaultBaseQueue();
}