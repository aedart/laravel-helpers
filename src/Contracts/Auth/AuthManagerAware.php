<?php

namespace Aedart\Laravel\Helpers\Contracts\Auth;

use Illuminate\Auth\AuthManager;

/**
 * Auth Manager Aware
 *
 * @see \Illuminate\Auth\AuthManager
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Auth
 */
interface AuthManagerAware
{
    /**
     * Set auth manager
     *
     * @param AuthManager|null $manager Auth Manager instance
     *
     * @return self
     */
    public function setAuthManager(?AuthManager $manager);

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
    public function getAuthManager(): ?AuthManager;

    /**
     * Check if auth manager has been set
     *
     * @return bool True if auth manager has been set, false if not
     */
    public function hasAuthManager(): bool;

    /**
     * Get a default auth manager value, if any is available
     *
     * @return AuthManager|null A default auth manager value or Null if no default value is available
     */
    public function getDefaultAuthManager(): ?AuthManager;
}