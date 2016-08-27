<?php
namespace Aedart\Laravel\Helpers\Traits\Notifications;

use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Support\Facades\Notification;

/**
 * <h1>Notification Dispatcher Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Notifications\NotificationDispatcherAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Notifications
 */
trait NotificationDispatcherTrait
{
    /**
     * Instance of a Notification Dispatcher
     *
     * @var Dispatcher|null
     */
    protected $notificationDispatcher = null;

    /**
     * Set the given notification dispatcher
     *
     * @param Dispatcher $dispatcher Instance of a Notification Dispatcher
     *
     * @return void
     */
    public function setNotificationDispatcher(Dispatcher $dispatcher)
    {
        $this->notificationDispatcher = $dispatcher;
    }

    /**
     * Get the given notification dispatcher
     *
     * If no notification dispatcher has been set, this method will
     * set and return a default notification dispatcher, if any such
     * value is available
     *
     * @see getDefaultNotificationDispatcher()
     *
     * @return Dispatcher|null notification dispatcher or null if none notification dispatcher has been set
     */
    public function getNotificationDispatcher()
    {
        if (!$this->hasNotificationDispatcher() && $this->hasDefaultNotificationDispatcher()) {
            $this->setNotificationDispatcher($this->getDefaultNotificationDispatcher());
        }
        return $this->notificationDispatcher;
    }

    /**
     * Get a default notification dispatcher value, if any is available
     *
     * @return Dispatcher|null A default notification dispatcher value or Null if no default value is available
     */
    public function getDefaultNotificationDispatcher()
    {
        return Notification::getFacadeRoot();
    }

    /**
     * Check if notification dispatcher has been set
     *
     * @return bool True if notification dispatcher has been set, false if not
     */
    public function hasNotificationDispatcher()
    {
        return !is_null($this->notificationDispatcher);
    }

    /**
     * Check if a default notification dispatcher is available or not
     *
     * @return bool True of a default notification dispatcher is available, false if not
     */
    public function hasDefaultNotificationDispatcher()
    {
        return !is_null($this->getDefaultNotificationDispatcher());
    }
}