<?php

namespace Aedart\Laravel\Helpers\Traits\Broadcasting;

use Illuminate\Contracts\Broadcasting\Factory;
use Illuminate\Support\Facades\Broadcast;

/**
 * <h1>Broadcast Factory Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Broadcasting\BroadcastFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Broadcasting
 */
trait BroadcastFactoryTrait
{
    /**
     * Instance of a Broadcast Factory
     *
     * @var Factory|null
     */
    protected $broadcastFactory = null;

    /**
     * Set the given broadcast factory
     *
     * @param Factory $factory Instance of a Broadcast Factory
     *
     * @return void
     */
    public function setBroadcastFactory(Factory $factory)
    {
        $this->broadcastFactory = $factory;
    }

    /**
     * Get the given broadcast factory
     *
     * If no broadcast factory has been set, this method will
     * set and return a default broadcast factory, if any such
     * value is available
     *
     * @see getDefaultBroadcastFactory()
     *
     * @return Factory|null broadcast factory or null if none broadcast factory has been set
     */
    public function getBroadcastFactory()
    {
        if (!$this->hasBroadcastFactory() && $this->hasDefaultBroadcastFactory()) {
            $this->setBroadcastFactory($this->getDefaultBroadcastFactory());
        }
        return $this->broadcastFactory;
    }

    /**
     * Get a default broadcast factory value, if any is available
     *
     * @return Factory|null A default broadcast factory value or Null if no default value is available
     */
    public function getDefaultBroadcastFactory()
    {
        return Broadcast::getFacadeRoot();
    }

    /**
     * Check if broadcast factory has been set
     *
     * @return bool True if broadcast factory has been set, false if not
     */
    public function hasBroadcastFactory()
    {
        return !is_null($this->broadcastFactory);
    }

    /**
     * Check if a default broadcast factory is available or not
     *
     * @return bool True of a default broadcast factory is available, false if not
     */
    public function hasDefaultBroadcastFactory()
    {
        return !is_null($this->getDefaultBroadcastFactory());
    }
}