<?php namespace Aedart\Facade\Helpers\Contracts;

use Illuminate\Cookie\CookieJar;

/**
 * <h1>Cookie Aware</h1>
 *
 * Components are able to specify and obtain a cookie jar.
 * In addition to this, components are also able to check if a
 * given cookie (in the current request) contains a specific
 * entry / get and obtain its value
 *
 * @see \Illuminate\Cookie\CookieJar
 * @see \Illuminate\Support\Facades\Cookie
 * @see \Illuminate\Http\Request::cookie
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface CookieAware {

    /**
     * Set the given cookie
     *
     * @param CookieJar $jar Instance of a cookie jar
     *
     * @return void
     */
    public function setCookie($jar);

    /**
     * Get the given cookie
     *
     * If no cookie has been set, this method will
     * set and return a default cookie, if any such
     * value is available
     *
     * @see getDefaultCookie()
     *
     * @return CookieJar|null cookie or null if none cookie has been set
     */
    public function getCookie();

    /**
     * Get a default cookie value, if any is available
     *
     * @return CookieJar|null A default cookie value or Null if no default value is available
     */
    public function getDefaultCookie();

    /**
     * Check if cookie has been set
     *
     * @return bool True if cookie has been set, false if not
     */
    public function hasCookie();

    /**
     * Check if a default cookie is available or not
     *
     * @return bool True of a default cookie is available, false if not
     */
    public function hasDefaultCookie();

    /**
     * Check if a cookie exists on the current request
     *
     * @param string $key
     *
     * @return bool
     *
     * @see \Illuminate\Support\Facades\Cookie::has
     * @see \Illuminate\Http\Request::cookie
     */
    public function hasCookieKey($key);

    /**
     * Fetch a cookie from the current request
     *
     * @param string $key [optional]
     * @param mixed $default [optional]
     *
     * @return array|string|null
     *
     * @see \Illuminate\Support\Facades\Cookie::get
     * @see \Illuminate\Http\Request::cookie
     */
    public function getCookieValue($key = null, $default = null);

    /**
     * Check if a request instance is available
     *
     * @return bool
     */
    public function hasRequest();

    /**
     * Returns an instance of the current request
     *
     * @return \Illuminate\Http\Request|null Request or null if not available
     */
    public function getRequest();
}