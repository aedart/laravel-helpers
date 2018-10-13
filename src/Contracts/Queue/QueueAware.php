<?php

namespace Aedart\Laravel\Helpers\Contracts\Queue;

use Illuminate\Contracts\Queue\Queue;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Queue\QueueAware, in aedart/athenaeum package
 *
 * Queue Aware
 *
 * @see \Illuminate\Contracts\Queue\Queue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Queue
 */
interface QueueAware
{
    /**
     * Set queue
     *
     * @param Queue|null $queue Queue Instance
     *
     * @return self
     */
    public function setQueue(?Queue $queue);

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
    public function getQueue(): ?Queue;

    /**
     * Check if queue has been set
     *
     * @return bool True if queue has been set, false if not
     */
    public function hasQueue(): bool;

    /**
     * Get a default queue value, if any is available
     *
     * @return Queue|null A default queue value or Null if no default value is available
     */
    public function getDefaultQueue(): ?Queue;
}
