<?php namespace Aedart\Laravel\Helpers\Contracts\Auth;

use Illuminate\Auth\Passwords\PasswordBrokerManager;

/**
 * <h1>Password Broker Manager Aware</h1>
 *
 * Components are able to specify and obtain the password broker manager
 *
 * @see \Illuminate\Auth\Passwords\PasswordBrokerManager
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
interface PasswordBrokerManagerAware {

    /**
     * Set the given password broker manager
     *
     * @param PasswordBrokerManager $manager Instance of the Password Broker Manager
     *
     * @return void
     */
    public function setPasswordBrokerManager(PasswordBrokerManager $manager);

    /**
     * Get the given password broker manager
     *
     * If no password broker manager has been set, this method will
     * set and return a default password broker manager, if any such
     * value is available
     *
     * @see getDefaultPasswordBrokerManager()
     *
     * @return PasswordBrokerManager|null password broker manager or null if none password broker manager has been set
     */
    public function getPasswordBrokerManager();

    /**
     * Get a default password broker manager value, if any is available
     *
     * @return PasswordBrokerManager|null A default password broker manager value or Null if no default value is available
     */
    public function getDefaultPasswordBrokerManager();

    /**
     * Check if password broker manager has been set
     *
     * @return bool True if password broker manager has been set, false if not
     */
    public function hasPasswordBrokerManager();

    /**
     * Check if a default password broker manager is available or not
     *
     * @return bool True of a default password broker manager is available, false if not
     */
    public function hasDefaultPasswordBrokerManager();
}