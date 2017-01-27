<?php

namespace Aedart\Laravel\Helpers\Contracts\Notifications;

use Illuminate\Contracts\Notifications\Factory;

/**
 * <h1>Notification Factory Aware</h1>
 *
 * Component os aware of a notification factory, which can also
 * be specified.
 *
 * @see \Illuminate\Contracts\Notifications\Factory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Notifications
 */
interface NotificationFactoryAware
{
    /**
     * Set the given notification factory
     *
     * @param Factory $factory Instance of a Notification Factory
     *
     * @return void
     */
    public function setNotificationFactory(Factory $factory);

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
    public function getNotificationFactory();

    /**
     * Get a default notification factory value, if any is available
     *
     * @return Factory|null A default notification factory value or Null if no default value is available
     */
    public function getDefaultNotificationFactory();

    /**
     * Check if notification factory has been set
     *
     * @return bool True if notification factory has been set, false if not
     */
    public function hasNotificationFactory();

    /**
     * Check if a default notification factory is available or not
     *
     * @return bool True of a default notification factory is available, false if not
     */
    public function hasDefaultNotificationFactory();
}