<?php

namespace Aedart\Laravel\Helpers\Traits\Queue;

use Illuminate\Contracts\Queue\Queue;
use Illuminate\Support\Facades\Queue as QueueFacade;

/**
 * <h1>Queue Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Queue\QueueAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait QueueTrait
{
    /**
     * Instance of a queue
     *
     * @var Queue|null
     */
    protected $queue = null;

    /**
     * Set the given queue
     *
     * @param Queue $queue Instance of a queue
     *
     * @return void
     */
    public function setQueue(Queue $queue)
    {
        $this->queue = $queue;
    }

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
    public function getQueue()
    {
        if (!$this->hasQueue() && $this->hasDefaultQueue()) {
            $this->setQueue($this->getDefaultQueue());
        }
        return $this->queue;
    }

    /**
     * Get a default queue value, if any is available
     *
     * @return Queue|null A default queue value or Null if no default value is available
     */
    public function getDefaultQueue()
    {
        // By default, the Queue Facade does not return the
        // any actual database connection, but rather an
        // instance of \Illuminate\Queue\QueueManager.
        // Therefore, we make sure only to obtain its
        // "connection", to make sure that its only the connection
        // instance that we obtain.
        $manager = QueueFacade::getFacadeRoot();
        if (!is_null($manager)) {
            return $manager->connection();
        }
        return $manager;
    }

    /**
     * Check if queue has been set
     *
     * @return bool True if queue has been set, false if not
     */
    public function hasQueue()
    {
        return isset($this->queue);
    }

    /**
     * Check if a default queue is available or not
     *
     * @return bool True of a default queue is available, false if not
     */
    public function hasDefaultQueue()
    {
        $default = $this->getDefaultQueue();
        return isset($default);
    }
}