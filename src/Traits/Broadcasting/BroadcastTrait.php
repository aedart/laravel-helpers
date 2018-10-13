<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Broadcasting;

use Illuminate\Contracts\Broadcasting\Broadcaster;
use Illuminate\Support\Facades\Broadcast;

/**
 * @deprecated Use \Aedart\Support\Helpers\Broadcasting\BroadcastTrait, in aedart/athenaeum package
 *
 * Broadcast Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Broadcasting\BroadcastAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Broadcasting
 */
trait BroadcastTrait
{
    /**
     * Broadcaster instance
     *
     * @var Broadcaster|null
     */
    protected $broadcast = null;

    /**
     * Set broadcast
     *
     * @param Broadcaster|null $broadcaster Broadcaster instance
     *
     * @return self
     */
    public function setBroadcast(?Broadcaster $broadcaster)
    {
        $this->broadcast = $broadcaster;

        return $this;
    }

    /**
     * Get broadcast
     *
     * If no broadcast has been set, this method will
     * set and return a default broadcast, if any such
     * value is available
     *
     * @see getDefaultBroadcast()
     *
     * @return Broadcaster|null broadcast or null if none broadcast has been set
     */
    public function getBroadcast(): ?Broadcaster
    {
        if (!$this->hasBroadcast()) {
            $this->setBroadcast($this->getDefaultBroadcast());
        }
        return $this->broadcast;
    }

    /**
     * Check if broadcast has been set
     *
     * @return bool True if broadcast has been set, false if not
     */
    public function hasBroadcast(): bool
    {
        return isset($this->broadcast);
    }

    /**
     * Get a default broadcast value, if any is available
     *
     * @return Broadcaster|null A default broadcast value or Null if no default value is available
     */
    public function getDefaultBroadcast(): ?Broadcaster
    {
        // By default, the Broadcast Facade does not return the
        // any actual broadcaster, but rather an
        // instance of a manager.
        // Therefore, we make sure only to obtain its
        // "broadcaster", to make sure that its only the
        // connection is obtained!
        $manager = Broadcast::getFacadeRoot();
        if (isset($manager)) {
            return $manager->connection();
        }
        return $manager;
    }
}
