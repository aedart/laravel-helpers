<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Queue;

use Illuminate\Contracts\Queue\Queue;
use Illuminate\Support\Facades\Queue as QueueFacade;

/**
 * @deprecated Use \Aedart\Support\Helpers\Queue\QueueTrait, in aedart/athenaeum package
 *
 * Queue Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Queue\QueueAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Queue
 */
trait QueueTrait
{
    /**
     * Queue Instance
     *
     * @var Queue|null
     */
    protected $queue = null;

    /**
     * Set queue
     *
     * @param Queue|null $queue Queue Instance
     *
     * @return self
     */
    public function setQueue(?Queue $queue)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * If no queue has been set, this method will
     * set and return a default queue, if any such
     * value is available
     *
     * @see getDefaultQueue()
     *
     * @return Queue|null queue or null if none queue has been set
     */
    public function getQueue(): ?Queue
    {
        if (!$this->hasQueue()) {
            $this->setQueue($this->getDefaultQueue());
        }
        return $this->queue;
    }

    /**
     * Check if queue has been set
     *
     * @return bool True if queue has been set, false if not
     */
    public function hasQueue(): bool
    {
        return isset($this->queue);
    }

    /**
     * Get a default queue value, if any is available
     *
     * @return Queue|null A default queue value or Null if no default value is available
     */
    public function getDefaultQueue(): ?Queue
    {
        // By default, the Queue Facade does not return the
        // any actual database connection, but rather an
        // instance of \Illuminate\Queue\QueueManager.
        // Therefore, we make sure only to obtain its
        // "connection", to make sure that its only the connection
        // instance that we obtain.
        $manager = QueueFacade::getFacadeRoot();
        if (isset($manager)) {
            return $manager->connection();
        }
        return $manager;
    }
}
