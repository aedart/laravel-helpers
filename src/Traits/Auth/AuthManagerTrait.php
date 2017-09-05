<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Auth;

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;

/**
 * AuthManagerTrait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\AuthManagerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
trait AuthManagerTrait
{
    /**
     * Auth Manager instance
     *
     * @var AuthManager|null
     */
    protected $authManager = null;

    /**
     * Set auth manager
     *
     * @param AuthManager|null $manager Auth Manager instance
     *
     * @return self
     */
    public function setAuthManager(?AuthManager $manager)
    {
        $this->authManager = $manager;

        return $this;
    }

    /**
     * Get auth manager
     *
     * If no auth manager has been set, this method will
     * set and return a default auth manager, if any such
     * value is available
     *
     * @see getDefaultAuthManager()
     *
     * @return AuthManager|null auth manager or null if none auth manager has been set
     */
    public function getAuthManager(): ?AuthManager
    {
        if (!$this->hasAuthManager()) {
            $this->setAuthManager($this->getDefaultAuthManager());
        }
        return $this->authManager;
    }

    /**
     * Check if auth manager has been set
     *
     * @return bool True if auth manager has been set, false if not
     */
    public function hasAuthManager(): bool
    {
        return isset($this->authManager);
    }

    /**
     * Get a default auth manager value, if any is available
     *
     * @return AuthManager|null A default auth manager value or Null if no default value is available
     */
    public function getDefaultAuthManager(): ?AuthManager
    {
        return Auth::getFacadeRoot();
    }
}