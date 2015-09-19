<?php namespace Aedart\Laravel\Helpers\Contracts\Queue;

use Illuminate\Contracts\Queue\Factory;

/**
 * <h1>Queue Factory Aware</h1>
 *
 * Components are able to specify and obtain a queue-factory
 * utility component.
 *
 * @see \Illuminate\Contracts\Queue\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface QueueFactoryAware {

    /**
     * Set the given queue factory
     *
     * @param Factory $factory Instance of a Queue Factory
     *
     * @return void
     */
    public function setQueueFactory(Factory $factory);

    /**
     * Get the given queue factory
     *
     * If no queue factory has been set, this method will
     * set and return a default queue factory, if any such
     * value is available
     *
     * @see getDefaultQueueFactory()
     *
     * @return Factory|null queue factory or null if none queue factory has been set
     */
    public function getQueueFactory();

    /**
     * Get a default queue factory value, if any is available
     *
     * @return Factory|null A default queue factory value or Null if no default value is available
     */
    public function getDefaultQueueFactory();

    /**
     * Check if queue factory has been set
     *
     * @return bool True if queue factory has been set, false if not
     */
    public function hasQueueFactory();

    /**
     * Check if a default queue factory is available or not
     *
     * @return bool True of a default queue factory is available, false if not
     */
    public function hasDefaultQueueFactory();
}