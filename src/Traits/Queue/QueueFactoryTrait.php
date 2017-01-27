<?php

namespace Aedart\Laravel\Helpers\Traits\Queue;

use Illuminate\Contracts\Queue\Factory;
use Illuminate\Support\Facades\Queue;

/**
 * <h1>Queue Factory Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Queue\QueueFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait QueueFactoryTrait
{
    /**
     * Instance of a Queue Factory
     *
     * @var Factory|null
     */
    protected $queueFactory = null;

    /**
     * Set the given queue factory
     *
     * @param Factory $factory Instance of a Queue Factory
     *
     * @return void
     */
    public function setQueueFactory(Factory $factory)
    {
        $this->queueFactory = $factory;
    }

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
    public function getQueueFactory()
    {
        if (!$this->hasQueueFactory() && $this->hasDefaultQueueFactory()) {
            $this->setQueueFactory($this->getDefaultQueueFactory());
        }
        return $this->queueFactory;
    }

    /**
     * Get a default queue factory value, if any is available
     *
     * @return Factory|null A default queue factory value or Null if no default value is available
     */
    public function getDefaultQueueFactory()
    {
        return Queue::getFacadeRoot();
    }

    /**
     * Check if queue factory has been set
     *
     * @return bool True if queue factory has been set, false if not
     */
    public function hasQueueFactory()
    {
        if (!is_null($this->queueFactory)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default queue factory is available or not
     *
     * @return bool True of a default queue factory is available, false if not
     */
    public function hasDefaultQueueFactory()
    {
        if (!is_null($this->getDefaultQueueFactory())) {
            return true;
        }
        return false;
    }
}