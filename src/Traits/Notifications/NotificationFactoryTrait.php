<?php
namespace Aedart\Laravel\Helpers\Traits\Notifications;

use Illuminate\Contracts\Notifications\Factory;
use Illuminate\Support\Facades\Notification;

/**
 * <h1>Notification Factory Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Notifications\NotificationFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Notifications
 */
trait NotificationFactoryTrait
{
    /**
     * Instance of a Notification Factory
     *
     * @var Factory|null
     */
    protected $notificationFactory = null;

    /**
     * Set the given notification factory
     *
     * @param Factory $factory Instance of a Notification Factory
     *
     * @return void
     */
    public function setNotificationFactory(Factory $factory)
    {
        $this->notificationFactory = $factory;
    }

    /**
     * Get the given notification factory
     *
     * If no notification factory has been set, this method will
     * set and return a default notification factory, if any such
     * value is available
     *
     * @see getDefaultNotificationFactory()
     *
     * @return Factory|null notification factory or null if none notification factory has been set
     */
    public function getNotificationFactory()
    {
        if (!$this->hasNotificationFactory() && $this->hasDefaultNotificationFactory()) {
            $this->setNotificationFactory($this->getDefaultNotificationFactory());
        }
        return $this->notificationFactory;
    }

    /**
     * Get a default notification factory value, if any is available
     *
     * @return Factory|null A default notification factory value or Null if no default value is available
     */
    public function getDefaultNotificationFactory()
    {
        return Notification::getFacadeRoot();
    }

    /**
     * Check if notification factory has been set
     *
     * @return bool True if notification factory has been set, false if not
     */
    public function hasNotificationFactory()
    {
        return !is_null($this->notificationFactory);
    }

    /**
     * Check if a default notification factory is available or not
     *
     * @return bool True of a default notification factory is available, false if not
     */
    public function hasDefaultNotificationFactory()
    {
        return !is_null($this->getDefaultNotificationFactory());
    }
}