<?php

namespace Aedart\Laravel\Helpers\Contracts\Notifications;

use Illuminate\Contracts\Notifications\Factory;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Notifications\NotificationFactoryAware, in aedart/athenaeum package
 *
 * Notification Factory Aware
 *
 * @see \Illuminate\Contracts\Notifications\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Notifications
 */
interface NotificationFactoryAware
{
    /**
     * Set notification factory
     *
     * @param Factory|null $factory Notification Factory Instance
     *
     * @return self
     */
    public function setNotificationFactory(?Factory $factory);

    /**
     * Get notification factory
     *
     * If no notification factory has been set, this method will
     * set and return a default notification factory, if any such
     * value is available
     *
     * @see getDefaultNotificationFactory()
     *
     * @return Factory|null notification factory or null if none notification factory has been set
     */
    public function getNotificationFactory(): ?Factory;

    /**
     * Check if notification factory has been set
     *
     * @return bool True if notification factory has been set, false if not
     */
    public function hasNotificationFactory(): bool;

    /**
     * Get a default notification factory value, if any is available
     *
     * @return Factory|null A default notification factory value or Null if no default value is available
     */
    public function getDefaultNotificationFactory(): ?Factory;
}
