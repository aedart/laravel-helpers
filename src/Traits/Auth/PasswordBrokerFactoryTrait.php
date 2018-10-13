<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Auth;

use Illuminate\Contracts\Auth\PasswordBrokerFactory;
use Illuminate\Support\Facades\Password;

/**
 * @deprecated Use \Aedart\Support\Helpers\Auth\PasswordBrokerFactoryTrait, in aedart/athenaeum package
 *
 * PasswordBrokerFactoryTrait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerFactoryAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
trait PasswordBrokerFactoryTrait
{
    /**
     * Password Broker Factory instance
     *
     * @var PasswordBrokerFactory|null
     */
    protected $passwordBrokerFactory = null;

    /**
     * Set password broker factory
     *
     * @param PasswordBrokerFactory|null $factory Password Broker Factory instance
     *
     * @return self
     */
    public function setPasswordBrokerFactory(?PasswordBrokerFactory $factory)
    {
        $this->passwordBrokerFactory = $factory;

        return $this;
    }

    /**
     * Get password broker factory
     *
     * If no password broker factory has been set, this method will
     * set and return a default password broker factory, if any such
     * value is available
     *
     * @see getDefaultPasswordBrokerFactory()
     *
     * @return PasswordBrokerFactory|null password broker factory or null if none password broker factory has been set
     */
    public function getPasswordBrokerFactory(): ?PasswordBrokerFactory
    {
        if (!$this->hasPasswordBrokerFactory()) {
            $this->setPasswordBrokerFactory($this->getDefaultPasswordBrokerFactory());
        }
        return $this->passwordBrokerFactory;
    }

    /**
     * Check if password broker factory has been set
     *
     * @return bool True if password broker factory has been set, false if not
     */
    public function hasPasswordBrokerFactory(): bool
    {
        return isset($this->passwordBrokerFactory);
    }

    /**
     * Get a default password broker factory value, if any is available
     *
     * @return PasswordBrokerFactory|null A default password broker factory value or Null if no default value is available
     */
    public function getDefaultPasswordBrokerFactory(): ?PasswordBrokerFactory
    {
        return Password::getFacadeRoot();
    }
}
