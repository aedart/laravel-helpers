<?php

namespace Aedart\Laravel\Helpers\Contracts\Auth;

use Illuminate\Contracts\Auth\PasswordBroker;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Auth\PasswordAware, in aedart/athenaeum package
 *
 * Password Aware
 *
 * @see \Illuminate\Contracts\Auth\PasswordBroker
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Auth
 */
interface PasswordAware
{
    /**
     * Set password
     *
     * @param PasswordBroker|null $broker Password Broker instance
     *
     * @return self
     */
    public function setPassword(?PasswordBroker $broker);

    /**
     * Get password
     *
     * If no password has been set, this method will
     * set and return a default password, if any such
     * value is available
     *
     * @see getDefaultPassword()
     *
     * @return PasswordBroker|null password or null if none password has been set
     */
    public function getPassword(): ?PasswordBroker;

    /**
     * Check if password has been set
     *
     * @return bool True if password has been set, false if not
     */
    public function hasPassword(): bool;

    /**
     * Get a default password value, if any is available
     *
     * @return PasswordBroker|null A default password value or Null if no default value is available
     */
    public function getDefaultPassword(): ?PasswordBroker;
}
