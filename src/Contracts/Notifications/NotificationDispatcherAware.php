<?php

namespace Aedart\Laravel\Helpers\Contracts\Notifications;

use Illuminate\Contracts\Notifications\Dispatcher;

/**
 * <h1>Notification Dispatcher Aware></h1>
 *
 * Components is aware of a notification dispatcher, which can also
 * be specified
 *
 * @see \Illuminate\Contracts\Notifications\Dispatcher
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Notifications
 */
interface NotificationDispatcherAware
{
    /**
     * Set the given notification dispatcher
     *
     * @param Dispatcher $dispatcher Instance of a Notification Dispatcher
     *
     * @return void
     */
    public function setNotificationDispatcher(Dispatcher $dispatcher);

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
    public function getNotificationDispatcher();

    /**
     * Get a default notification dispatcher value, if any is available
     *
     * @return Dispatcher|null A default notification dispatcher value or Null if no default value is available
     */
    public function getDefaultNotificationDispatcher();

    /**
     * Check if notification dispatcher has been set
     *
     * @return bool True if notification dispatcher has been set, false if not
     */
    public function hasNotificationDispatcher();

    /**
     * Check if a default notification dispatcher is available or not
     *
     * @return bool True of a default notification dispatcher is available, false if not
     */
    public function hasDefaultNotificationDispatcher();
}