<?php

namespace Aedart\Laravel\Helpers\Traits\Auth;

use Illuminate\Contracts\Auth\PasswordBrokerFactory;
use Illuminate\Support\Facades\Password;

/**
 * <h1>Password Broker Factory Trait</h1>
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
trait PasswordBrokerFactoryTrait
{
    /**
     * Instance of a password broker factory
     *
     * @var PasswordBrokerFactory|null
     */
    protected $passwordBrokerFactory = null;

    /**
     * Set the given password broker factory
     *
     * @param PasswordBrokerFactory $factory Instance of a password broker factory
     *
     * @return void
     */
    public function setPasswordBrokerFactory(PasswordBrokerFactory $factory)
    {
        $this->passwordBrokerFactory = $factory;
    }

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
    public function getPasswordBrokerFactory()
    {
        if (!$this->hasPasswordBrokerFactory() && $this->hasDefaultPasswordBrokerFactory()) {
            $this->setPasswordBrokerFactory($this->getDefaultPasswordBrokerFactory());
        }
        return $this->passwordBrokerFactory;
    }

    /**
     * Get a default password broker factory value, if any is available
     *
     * @return PasswordBrokerFactory|null A default password broker factory value or Null if no default value is available
     */
    public function getDefaultPasswordBrokerFactory()
    {
        static $passwordBrokerFactory;
        return isset($passwordBrokerFactory) ? $passwordBrokerFactory : $passwordBrokerFactory = Password::getFacadeRoot();
    }

    /**
     * Check if password broker factory has been set
     *
     * @return bool True if password broker factory has been set, false if not
     */
    public function hasPasswordBrokerFactory()
    {
        return isset($this->passwordBrokerFactory);
    }

    /**
     * Check if a default password broker factory is available or not
     *
     * @return bool True of a default password broker factory is available, false if not
     */
    public function hasDefaultPasswordBrokerFactory()
    {
        $default = $this->getDefaultPasswordBrokerFactory();
        return isset($default);
    }
}