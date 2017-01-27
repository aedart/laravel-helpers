<?php

namespace Aedart\Laravel\Helpers\Traits\Queue;

use Illuminate\Queue\QueueManager;
use Illuminate\Support\Facades\Queue;

/**
 * <h1>Queue Manager Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Queue\QueueManagerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait QueueManagerTrait
{
    /**
     * Instance of Laravel's Queue Manager
     *
     * @var QueueManager|null
     */
    protected $queueManager = null;

    /**
     * Set the given queue manager
     *
     * @param QueueManager $manager Instance of Laravel's Queue Manager
     *
     * @return void
     */
    public function setQueueManager(QueueManager $manager)
    {
        $this->queueManager = $manager;
    }

    /**
     * Get the given queue manager
     *
     * If no queue manager has been set, this method will
     * set and return a default queue manager, if any such
     * value is available
     *
     * @see getDefaultQueueManager()
     *
     * @return QueueManager|null queue manager or null if none queue manager has been set
     */
    public function getQueueManager()
    {
        if (!$this->hasQueueManager() && $this->hasDefaultQueueManager()) {
            $this->setQueueManager($this->getDefaultQueueManager());
        }
        return $this->queueManager;
    }

    /**
     * Get a default queue manager value, if any is available
     *
     * @return QueueManager|null A default queue manager value or Null if no default value is available
     */
    public function getDefaultQueueManager()
    {
        return Queue::getFacadeRoot();
    }

    /**
     * Check if queue manager has been set
     *
     * @return bool True if queue manager has been set, false if not
     */
    public function hasQueueManager()
    {
        if (!is_null($this->queueManager)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default queue manager is available or not
     *
     * @return bool True of a default queue manager is available, false if not
     */
    public function hasDefaultQueueManager()
    {
        if (!is_null($this->getDefaultQueueManager())) {
            return true;
        }
        return false;
    }
}