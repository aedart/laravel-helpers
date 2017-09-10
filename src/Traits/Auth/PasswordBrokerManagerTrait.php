<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Auth;

use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Support\Facades\Password;

/**
 * PasswordBrokerManagerTrait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerManagerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
trait PasswordBrokerManagerTrait
{
    /**
     * Password Broker Manager instance
     *
     * @var PasswordBrokerManager|null
     */
    protected $passwordBrokerManager = null;

    /**
     * Set password broker manager
     *
     * @param PasswordBrokerManager|null $manager Password Broker Manager instance
     *
     * @return self
     */
    public function setPasswordBrokerManager(?PasswordBrokerManager $manager)
    {
        $this->passwordBrokerManager = $manager;

        return $this;
    }

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
    public function getPasswordBrokerManager(): ?PasswordBrokerManager
    {
        if (!$this->hasPasswordBrokerManager()) {
            $this->setPasswordBrokerManager($this->getDefaultPasswordBrokerManager());
        }
        return $this->passwordBrokerManager;
    }

    /**
     * Check if password broker manager has been set
     *
     * @return bool True if password broker manager has been set, false if not
     */
    public function hasPasswordBrokerManager(): bool
    {
        return isset($this->passwordBrokerManager);
    }

    /**
     * Get a default password broker manager value, if any is available
     *
     * @return PasswordBrokerManager|null A default password broker manager value or Null if no default value is available
     */
    public function getDefaultPasswordBrokerManager(): ?PasswordBrokerManager
    {
        return Password::getFacadeRoot();
    }
}