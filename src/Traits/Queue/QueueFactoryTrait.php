<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Queue;

use Illuminate\Contracts\Queue\Factory;
use Illuminate\Support\Facades\Queue;

/**
 * @deprecated Use \Aedart\Support\Helpers\Queue\QueueFactoryTrait, in aedart/athenaeum package
 *
 * Queue Factory Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Queue\QueueFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Queue
 */
trait QueueFactoryTrait
{
    /**
     * Queue Factory Instance
     *
     * @var Factory|null
     */
    protected $queueFactory = null;

    /**
     * Set queue factory
     *
     * @param Factory|null $factory Queue Factory Instance
     *
     * @return self
     */
    public function setQueueFactory(?Factory $factory)
    {
        $this->queueFactory = $factory;

        return $this;
    }

    /**
     * Get queue factory
     *
     * If no queue factory has been set, this method will
     * set and return a default queue factory, if any such
     * value is available
     *
     * @see getDefaultQueueFactory()
     *
     * @return Factory|null queue factory or null if none queue factory has been set
     */
    public function getQueueFactory(): ?Factory
    {
        if (!$this->hasQueueFactory()) {
            $this->setQueueFactory($this->getDefaultQueueFactory());
        }
        return $this->queueFactory;
    }

    /**
     * Check if queue factory has been set
     *
     * @return bool True if queue factory has been set, false if not
     */
    public function hasQueueFactory(): bool
    {
        return isset($this->queueFactory);
    }

    /**
     * Get a default queue factory value, if any is available
     *
     * @return Factory|null A default queue factory value or Null if no default value is available
     */
    public function getDefaultQueueFactory(): ?Factory
    {
        return Queue::getFacadeRoot();
    }
}
