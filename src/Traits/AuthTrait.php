<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

/**
 * <h1>Auth Trait</h1>
 *
 * @see \Aedart\Facade\Helpers\Contracts\AuthAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait AuthTrait {

    /**
     * Instance of the authentication guard
     *
     * @var Guard|null
     */
    protected $auth = null;

    /**
     * Set the given auth
     *
     * @param Guard $guard Instance of the authentication guard
     *
     * @return void
     */
    public function setAuth(Guard $guard) {
        $this->auth = $guard;
    }

    /**
     * Get the given auth
     *
     * If no auth has been set, this method will
     * set and return a default auth, if any such
     * value is available
     *
     * @see getDefaultAuth()
     *
     * @return Guard|null auth or null if none auth has been set
     */
    public function getAuth() {
        if (!$this->hasAuth() && $this->hasDefaultAuth()) {
            $this->setAuth($this->getDefaultAuth());
        }
        return $this->auth;
    }

    /**
     * Get a default auth value, if any is available
     *
     * @return Guard|null A default auth value or Null if no default value is available
     */
    public function getDefaultAuth() {
        // By default, the Auth Facade does not return the
        // any actual authentication guard, but rather an
        // instance of \Illuminate\Auth\AuthManager.
        // Therefore, we make sure only to obtain its
        // "driver", to make sure that its only the guard
        // instance that we obtain.
        $manager = Auth::getFacadeRoot();
        if(!is_null($manager)){
            return $manager->driver();
        }
        return $manager;
    }

    /**
     * Check if auth has been set
     *
     * @return bool True if auth has been set, false if not
     */
    public function hasAuth() {
        if (!is_null($this->auth)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default auth is available or not
     *
     * @return bool True of a default auth is available, false if not
     */
    public function hasDefaultAuth() {
        if (!is_null($this->getDefaultAuth())) {
            return true;
        }
        return false;
    }
}