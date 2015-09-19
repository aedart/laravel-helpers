<?php namespace Aedart\Laravel\Helpers\Contracts\Auth;

use Illuminate\Contracts\Auth\Guard;

/**
 * <h1>Auth Aware</h1>
 *
 * Components are able to specify and obtain an authentication guard
 *
 * @see \Illuminate\Contracts\Auth\Guard
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface AuthAware {

    /**
     * Set the given auth
     *
     * @param Guard $guard Instance of the authentication guard
     *
     * @return void
     */
    public function setAuth(Guard $guard);

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
    public function getAuth();

    /**
     * Get a default auth value, if any is available
     *
     * @return Guard|null A default auth value or Null if no default value is available
     */
    public function getDefaultAuth();

    /**
     * Check if auth has been set
     *
     * @return bool True if auth has been set, false if not
     */
    public function hasAuth();

    /**
     * Check if a default auth is available or not
     *
     * @return bool True of a default auth is available, false if not
     */
    public function hasDefaultAuth();
}