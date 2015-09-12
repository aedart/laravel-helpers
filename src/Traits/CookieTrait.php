<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

/**
 * <h1>Cookie Trait</h1>
 *
 * @see \Aedart\Facade\Helpers\Contracts\CookieAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait CookieTrait {

    /**
     * Instance of a cookie jar
     *
     * @var CookieJar|null
     */
    protected $cookie = null;

    /**
     * Set the given cookie
     *
     * @param CookieJar $jar Instance of a cookie jar
     *
     * @return void
     */
    public function setCookie($jar) {
        $this->cookie = $jar;
    }

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
    public function getCookie() {
        if (!$this->hasCookie() && $this->hasDefaultCookie()) {
            $this->setCookie($this->getDefaultCookie());
        }
        return $this->cookie;
    }

    /**
     * Get a default cookie value, if any is available
     *
     * @return CookieJar|null A default cookie value or Null if no default value is available
     */
    public function getDefaultCookie() {
        return Cookie::getFacadeRoot();
    }

    /**
     * Check if cookie has been set
     *
     * @return bool True if cookie has been set, false if not
     */
    public function hasCookie() {
        if (!is_null($this->cookie)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default cookie is available or not
     *
     * @return bool True of a default cookie is available, false if not
     */
    public function hasDefaultCookie() {
        if (!is_null($this->getDefaultCookie())) {
            return true;
        }
        return false;
    }

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
    public function hasCookieKey($key){
        return !is_null($this->getRequest()->cookie($key, null));
    }

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
    public function getCookieValue($key = null, $default = null){
        return $this->getRequest()->cookie($key, $default);
    }

    /**
     * Check if a request instance is available
     *
     * @return bool
     */
    public function hasRequest(){
        return !is_null($this->getRequest());
    }

    /**
     * Returns an instance of the current request
     *
     * @return \Illuminate\Http\Request|null Request or null if not available
     */
    public function getRequest(){
        return Request::getFacadeRoot();
    }
}