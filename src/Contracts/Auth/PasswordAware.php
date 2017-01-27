<?php

namespace Aedart\Laravel\Helpers\Contracts\Auth;

use Illuminate\Contracts\Auth\PasswordBroker;

/**
 * <h1>Psr Log Aware</h1>
 *
 * Components are able to specify and obtain a Password Broker
 * utility component.
 *
 * @see \Illuminate\Contracts\Auth\PasswordBroker
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
interface PasswordAware
{
    /**
     * Set the given password
     *
     * @param PasswordBroker $broker Instance of a Password Broker
     *
     * @return void
     */
    public function setPassword(PasswordBroker $broker);

    /**
     * Get the given password
     *
     * If no password has been set, this method will
     * set and return a default password, if any such
     * value is available
     *
     * @see getDefaultPassword()
     *
     * @return PasswordBroker|null password or null if none password has been set
     */
    public function getPassword();

    /**
     * Get a default password value, if any is available
     *
     * @return PasswordBroker|null A default password value or Null if no default value is available
     */
    public function getDefaultPassword();

    /**
     * Check if password has been set
     *
     * @return bool True if password has been set, false if not
     */
    public function hasPassword();

    /**
     * Check if a default password is available or not
     *
     * @return bool True of a default password is available, false if not
     */
    public function hasDefaultPassword();
}