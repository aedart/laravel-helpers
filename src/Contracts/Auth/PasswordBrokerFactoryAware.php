<?php

namespace Aedart\Laravel\Helpers\Contracts\Auth;

use Illuminate\Contracts\Auth\PasswordBrokerFactory;

/**
 * <h1>Password Broker Factory Aware</h1>
 *
 * Components are able to specify and obtain the password broker manager
 *
 * @see \Illuminate\Contracts\Auth\PasswordBrokerFactory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
interface PasswordBrokerFactoryAware
{
    /**
     * Set the given password broker factory
     *
     * @param PasswordBrokerFactory $factory Instance of a password broker factory
     *
     * @return void
     */
    public function setPasswordBrokerFactory(PasswordBrokerFactory $factory);

    /**
     * Get the given password broker factory
     *
     * If no password broker factory has been set, this method will
     * set and return a default password broker factory, if any such
     * value is available
     *
     * @see getDefaultPasswordBrokerFactory()
     *
     * @return PasswordBrokerFactory|null password broker factory or null if none password broker factory has been set
     */
    public function getPasswordBrokerFactory();

    /**
     * Get a default password broker factory value, if any is available
     *
     * @return PasswordBrokerFactory|null A default password broker factory value or Null if no default value is available
     */
    public function getDefaultPasswordBrokerFactory();

    /**
     * Check if password broker factory has been set
     *
     * @return bool True if password broker factory has been set, false if not
     */
    public function hasPasswordBrokerFactory();

    /**
     * Check if a default password broker factory is available or not
     *
     * @return bool True of a default password broker factory is available, false if not
     */
    public function hasDefaultPasswordBrokerFactory();
}