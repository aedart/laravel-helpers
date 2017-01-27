<?php

namespace Aedart\Laravel\Helpers\Traits\Auth;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Password;

/**
 * <h1>Password Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\PasswordAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait PasswordTrait
{
    /**
     * Instance of a Password Broker
     *
     * @var PasswordBroker|null
     */
    protected $password = null;

    /**
     * Set the given password
     *
     * @param PasswordBroker $broker Instance of a Password Broker
     *
     * @return void
     */
    public function setPassword(PasswordBroker $broker)
    {
        $this->password = $broker;
    }

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
    public function getPassword()
    {
        if (!$this->hasPassword() && $this->hasDefaultPassword()) {
            $this->setPassword($this->getDefaultPassword());
        }
        return $this->password;
    }

    /**
     * Get a default password value, if any is available
     *
     * @return PasswordBroker|null A default password value or Null if no default value is available
     */
    public function getDefaultPassword()
    {
        static $password;
        if(isset($password)){
            return $password;
        }

        // By default, the Password Facade does not return the
        // any actual password broker, but rather an
        // instance of \Illuminate\Auth\Passwords\PasswordBrokerManager.
        // Therefore, we make sure only to obtain its
        // "default broker", to make sure that its only the guard
        // instance that we obtain.
        $manager = Password::getFacadeRoot();
        if (!is_null($manager)) {
            return $password = $manager->broker();
        }
        return $manager;
    }

    /**
     * Check if password has been set
     *
     * @return bool True if password has been set, false if not
     */
    public function hasPassword()
    {
        return isset($this->password);
    }

    /**
     * Check if a default password is available or not
     *
     * @return bool True of a default password is available, false if not
     */
    public function hasDefaultPassword()
    {
        $default = $this->getDefaultPassword();
        return isset($default);
    }
}