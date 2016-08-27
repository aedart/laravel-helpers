<?php
namespace Aedart\Laravel\Helpers\Traits\Broadcasting;

use Illuminate\Contracts\Broadcasting\Broadcaster;
use Illuminate\Support\Facades\Broadcast;

/**
 * <h1>Broadcast Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Broadcasting\BroadcastAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Broadcasting
 */
trait BroadcastTrait
{
    /**
     * Instance of a Broadcaster
     *
     * @var Broadcaster|null
     */
    protected $broadcast = null;

    /**
     * Set the given broadcast
     *
     * @param Broadcaster $broadcaster Instance of a Broadcaster
     *
     * @return void
     */
    public function setBroadcast(Broadcaster $broadcaster)
    {
        $this->broadcast = $broadcaster;
    }

    /**
     * Get the given broadcast
     *
     * If no broadcast has been set, this method will
     * set and return a default broadcast, if any such
     * value is available
     *
     * @see getDefaultBroadcast()
     *
     * @return Broadcaster|null broadcast or null if none broadcast has been set
     */
    public function getBroadcast()
    {
        if (!$this->hasBroadcast() && $this->hasDefaultBroadcast()) {
            $this->setBroadcast($this->getDefaultBroadcast());
        }
        return $this->broadcast;
    }

    /**
     * Get a default broadcast value, if any is available
     *
     * @return Broadcaster|null A default broadcast value or Null if no default value is available
     */
    public function getDefaultBroadcast()
    {
        // By default, the Broadcast Facade does not return the
        // any actual broadcaster, but rather an
        // instance of a manager.
        // Therefore, we make sure only to obtain its
        // "broadcaster", to make sure that its only the
        // connection is obtained!
        $manager = Broadcast::getFacadeRoot();
        if(!is_null($manager)){
            return $manager->connection();
        }
        return $manager;
    }

    /**
     * Check if broadcast has been set
     *
     * @return bool True if broadcast has been set, false if not
     */
    public function hasBroadcast()
    {
        return !is_null($this->broadcast);
    }

    /**
     * Check if a default broadcast is available or not
     *
     * @return bool True of a default broadcast is available, false if not
     */
    public function hasDefaultBroadcast()
    {
        return !is_null($this->getDefaultBroadcast());
    }
}