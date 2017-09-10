<?php

namespace Aedart\Laravel\Helpers\Contracts\Auth;

use Illuminate\Auth\Passwords\PasswordBrokerManager;

/**
 * Password Broker Manager Aware
 *
 * @see \Illuminate\Auth\Passwords\PasswordBrokerManager
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Auth
 */
interface PasswordBrokerManagerAware
{
    /**
     * Set password broker manager
     *
     * @param PasswordBrokerManager|null $manager Password Broker Manager instance
     *
     * @return self
     */
    public function setPasswordBrokerManager(?PasswordBrokerManager $manager);

    /**
     * Get password broker manager
     *
     * If no password broker manager has been set, this method will
     * set and return a default password broker manager, if any such
     * value is available
     *
     * @see getDefaultPasswordBrokerManager()
     *
     * @return PasswordBrokerManager|null password broker manager or null if none password broker manager has been set
     */
    public function getPasswordBrokerManager(): ?PasswordBrokerManager;

    /**
     * Check if password broker manager has been set
     *
     * @return bool True if password broker manager has been set, false if not
     */
    public function hasPasswordBrokerManager(): bool;

    /**
     * Get a default password broker manager value, if any is available
     *
     * @return PasswordBrokerManager|null A default password broker manager value or Null if no default value is available
     */
    public function getDefaultPasswordBrokerManager(): ?PasswordBrokerManager;
}