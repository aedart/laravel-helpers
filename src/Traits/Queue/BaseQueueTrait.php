<?php

namespace Aedart\Laravel\Helpers\Traits\Queue;

use Illuminate\Queue\Queue;
use Illuminate\Support\Facades\Queue as QueueFacade;

/**
 * <h1>Base Queue Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Queue\BaseQueueAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait BaseQueueTrait
{
    /**
     * Instance of a base queue
     *
     * @var Queue|null
     */
    protected $baseQueue = null;

    /**
     * Set the given base queue
     *
     * @param Queue $queue Instance of a base queue
     *
     * @return void
     */
    public function setBaseQueue(Queue $queue)
    {
        $this->baseQueue = $queue;
    }

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
    public function getBaseQueue()
    {
        if (!$this->hasBaseQueue() && $this->hasDefaultBaseQueue()) {
            $this->setBaseQueue($this->getDefaultBaseQueue());
        }
        return $this->baseQueue;
    }

    /**
     * Get a default base queue value, if any is available
     *
     * @return Queue|null A default base queue value or Null if no default value is available
     */
    public function getDefaultBaseQueue()
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
     * Check if base queue has been set
     *
     * @return bool True if base queue has been set, false if not
     */
    public function hasBaseQueue()
    {
        if (!is_null($this->baseQueue)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default base queue is available or not
     *
     * @return bool True of a default base queue is available, false if not
     */
    public function hasDefaultBaseQueue()
    {
        if (!is_null($this->getDefaultBaseQueue())) {
            return true;
        }
        return false;
    }
}