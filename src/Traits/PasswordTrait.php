<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Password;

/**
 * <h1>Password Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\PasswordAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits
 */
trait PasswordTrait {

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
    public function setPassword(PasswordBroker $broker) {
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
    public function getPassword() {
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
    public function getDefaultPassword() {
        return Password::getFacadeRoot();
    }

    /**
     * Check if password has been set
     *
     * @return bool True if password has been set, false if not
     */
    public function hasPassword() {
        if (!is_null($this->password)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default password is available or not
     *
     * @return bool True of a default password is available, false if not
     */
    public function hasDefaultPassword() {
        if (!is_null($this->getDefaultPassword())) {
            return true;
        }
        return false;
    }
}