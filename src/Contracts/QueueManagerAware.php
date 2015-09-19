<?php namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Queue\QueueManager;

/**
 * <h1>Queue Manager Aware</h1>
 *
 * Components are able to specify and obtain Laravel's Queue Manager
 * utility component.
 *
 * @see \Illuminate\Queue\QueueManager
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface QueueManagerAware {

    /**
     * Set the given queue manager
     *
     * @param QueueManager $manager Instance of Laravel's Queue Manager
     *
     * @return void
     */
    public function setQueueManager(QueueManager $manager);

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
    public function getQueueManager();

    /**
     * Get a default queue manager value, if any is available
     *
     * @return QueueManager|null A default queue manager value or Null if no default value is available
     */
    public function getDefaultQueueManager();

    /**
     * Check if queue manager has been set
     *
     * @return bool True if queue manager has been set, false if not
     */
    public function hasQueueManager();

    /**
     * Check if a default queue manager is available or not
     *
     * @return bool True of a default queue manager is available, false if not
     */
    public function hasDefaultQueueManager();
}