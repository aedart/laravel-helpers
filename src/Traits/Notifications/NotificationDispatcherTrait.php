<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Notifications;

use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Support\Facades\Notification;

/**
 * @deprecated Use \Aedart\Support\Helpers\Notifications\NotificationDispatcherTrait, in aedart/athenaeum package
 *
 * Notification Dispatcher Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Notifications\NotificationDispatcherAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Notifications
 */
trait NotificationDispatcherTrait
{
    /**
     * Notification Dispatcher Instance
     *
     * @var Dispatcher|null
     */
    protected $notificationDispatcher = null;

    /**
     * Set notification dispatcher
     *
     * @param Dispatcher|null $dispatcher Notification Dispatcher Instance
     *
     * @return self
     */
    public function setNotificationDispatcher(?Dispatcher $dispatcher)
    {
        $this->notificationDispatcher = $dispatcher;

        return $this;
    }

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
    public function getNotificationDispatcher(): ?Dispatcher
    {
        if (!$this->hasNotificationDispatcher()) {
            $this->setNotificationDispatcher($this->getDefaultNotificationDispatcher());
        }
        return $this->notificationDispatcher;
    }

    /**
     * Check if notification dispatcher has been set
     *
     * @return bool True if notification dispatcher has been set, false if not
     */
    public function hasNotificationDispatcher(): bool
    {
        return isset($this->notificationDispatcher);
    }

    /**
     * Get a default notification dispatcher value, if any is available
     *
     * @return Dispatcher|null A default notification dispatcher value or Null if no default value is available
     */
    public function getDefaultNotificationDispatcher(): ?Dispatcher
    {
        return Notification::getFacadeRoot();
    }
}
