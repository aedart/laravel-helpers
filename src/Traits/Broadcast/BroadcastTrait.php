<?php
namespace Aedart\Laravel\Helpers\Traits\Broadcast;

use Illuminate\Contracts\Broadcasting\Factory;
use Illuminate\Support\Facades\Broadcast;

/**
 * <h1>Broadcast Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Broadcast\BroadcastAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Broadcast
 */
trait BroadcastTrait
{
    /**
     * Instance of the broadcast factory
     *
     * @var Factory|null
     */
    protected $broadcast = null;

    /**
     * Set the given broadcast
     *
     * @param Factory $factory Instance of the broadcast factory
     *
     * @return void
     */
    public function setBroadcast(Factory $factory)
    {
        $this->broadcast = $factory;
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
     * @return Factory|null broadcast or null if none broadcast has been set
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
     * @return Factory|null A default broadcast value or Null if no default value is available
     */
    public function getDefaultBroadcast()
    {
        return Broadcast::getFacadeRoot();
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