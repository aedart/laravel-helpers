<?php

namespace Aedart\Laravel\Helpers\Contracts\Notifications;

use Illuminate\Contracts\Notifications\Dispatcher;

/**
 * Notification Dispatcher Aware
 *
 * @see \Illuminate\Contracts\Notifications\Dispatcher
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Notifications
 */
interface NotificationDispatcherAware
{
    /**
     * Set notification dispatcher
     *
     * @param Dispatcher|null $dispatcher Notification Dispatcher Instance
     *
     * @return self
     */
    public function setNotificationDispatcher(?Dispatcher $dispatcher);

    /**
     * Get notification dispatcher
     *
     * If no notification dispatcher has been set, this method will
     * set and return a default notification dispatcher, if any such
     * value is available
     *
     * @see getDefaultNotificationDispatcher()
     *
     * @return Dispatcher|null notification dispatcher or null if none notification dispatcher has been set
     */
    public function getNotificationDispatcher(): ?Dispatcher;

    /**
     * Check if notification dispatcher has been set
     *
     * @return bool True if notification dispatcher has been set, false if not
     */
    public function hasNotificationDispatcher(): bool;

    /**
     * Get a default notification dispatcher value, if any is available
     *
     * @return Dispatcher|null A default notification dispatcher value or Null if no default value is available
     */
    public function getDefaultNotificationDispatcher(): ?Dispatcher;
}