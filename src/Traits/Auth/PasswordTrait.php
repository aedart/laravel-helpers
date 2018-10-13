<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Auth;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Password;

/**
 * @deprecated Use \Aedart\Support\Helpers\Auth\PasswordTrait, in aedart/athenaeum package
 *
 * Password Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\PasswordAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
trait PasswordTrait
{
    /**
     * Password Broker instance
     *
     * @var PasswordBroker|null
     */
    protected $password = null;

    /**
     * Set password
     *
     * @param PasswordBroker|null $broker Password Broker instance
     *
     * @return self
     */
    public function setPassword(?PasswordBroker $broker)
    {
        $this->password = $broker;

        return $this;
    }

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
    public function getPassword(): ?PasswordBroker
    {
        if (!$this->hasPassword()) {
            $this->setPassword($this->getDefaultPassword());
        }
        return $this->password;
    }

    /**
     * Check if password has been set
     *
     * @return bool True if password has been set, false if not
     */
    public function hasPassword(): bool
    {
        return isset($this->password);
    }

    /**
     * Get a default password value, if any is available
     *
     * @return PasswordBroker|null A default password value or Null if no default value is available
     */
    public function getDefaultPassword(): ?PasswordBroker
    {
        // By default, the Password Facade does not return the
        // any actual password broker, but rather an
        // instance of \Illuminate\Auth\Passwords\PasswordBrokerManager.
        // Therefore, we make sure only to obtain its
        // "default broker", to make sure that its only the guard
        // instance that we obtain.
        $manager = Password::getFacadeRoot();
        if (isset($manager)) {
            return $manager->broker();
        }
        return $manager;
    }
}
