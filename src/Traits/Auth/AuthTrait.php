<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Auth;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

/**
 * @deprecated Use \Aedart\Support\Helpers\Auth\AuthTrait, in aedart/athenaeum package
 *
 * Auth Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Auth\AuthAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Auth
 */
trait AuthTrait
{
    /**
     * Access Guard Instance
     *
     * @var Guard|null
     */
    protected $auth = null;

    /**
     * Set auth
     *
     * @param Guard|null $guard Access Guard Instance
     *
     * @return self
     */
    public function setAuth(?Guard $guard)
    {
        $this->auth = $guard;

        return $this;
    }

    /**
     * Get auth
     *
     * If no auth has been set, this method will
     * set and return a default auth, if any such
     * value is available
     *
     * @see getDefaultAuth()
     *
     * @return Guard|null auth or null if none auth has been set
     */
    public function getAuth(): ?Guard
    {
        if (!$this->hasAuth()) {
            $this->setAuth($this->getDefaultAuth());
        }
        return $this->auth;
    }

    /**
     * Check if auth has been set
     *
     * @return bool True if auth has been set, false if not
     */
    public function hasAuth(): bool
    {
        return isset($this->auth);
    }

    /**
     * Get a default auth value, if any is available
     *
     * @return Guard|null A default auth value or Null if no default value is available
     */
    public function getDefaultAuth(): ?Guard
    {
        // By default, the Auth Facade does not return the
        // any actual authentication guard, but rather an
        // instance of \Illuminate\Auth\AuthManager.
        // Therefore, we make sure only to obtain its
        // "default guard", to make sure that its only the guard
        // instance that we obtain.
        $manager = Auth::getFacadeRoot();
        if (isset($manager)) {
            return $manager->guard();
        }
        return $manager;
    }
}
