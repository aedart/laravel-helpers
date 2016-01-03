<?php namespace Aedart\Laravel\Helpers\Traits\Auth;

use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Support\Facades\Password;

/**
 * <h1>Password Broker Manager Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerManagerAware;
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
trait PasswordBrokerManagerTrait {

    /**
     * Instance of the Password Broker Manager
     *
     * @var PasswordBrokerManager|null
     */
    protected $passwordBrokerManager = null;

    /**
     * Set the given password broker manager
     *
     * @param PasswordBrokerManager $manager Instance of the Password Broker Manager
     *
     * @return void
     */
    public function setPasswordBrokerManager(PasswordBrokerManager $manager) {
        $this->passwordBrokerManager = $manager;
    }

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
    public function getPasswordBrokerManager() {
        if (!$this->hasPasswordBrokerManager() && $this->hasDefaultPasswordBrokerManager()) {
            $this->setPasswordBrokerManager($this->getDefaultPasswordBrokerManager());
        }
        return $this->passwordBrokerManager;
    }

    /**
     * Get a default password broker manager value, if any is available
     *
     * @return PasswordBrokerManager|null A default password broker manager value or Null if no default value is available
     */
    public function getDefaultPasswordBrokerManager() {
        return Password::getFacadeRoot();
    }

    /**
     * Check if password broker manager has been set
     *
     * @return bool True if password broker manager has been set, false if not
     */
    public function hasPasswordBrokerManager() {
        return !is_null($this->passwordBrokerManager);
    }

    /**
     * Check if a default password broker manager is available or not
     *
     * @return bool True of a default password broker manager is available, false if not
     */
    public function hasDefaultPasswordBrokerManager() {
        return !is_null($this->getDefaultPasswordBrokerManager());
    }
}