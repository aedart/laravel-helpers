<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Cookie;

use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Support\Facades\Cookie;

/**
 * @deprecated Use \Aedart\Support\Helpers\Cookie\CookieTrait, in aedart/athenaeum package
 *
 * Cookie Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Cookie\CookieAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Cookie
 */
trait CookieTrait
{
    /**
     * Cookie Factory instance
     *
     * @var Factory|null
     */
    protected $cookie = null;

    /**
     * Set cookie
     *
     * @param Factory|null $factory Cookie Factory instance
     *
     * @return self
     */
    public function setCookie(?Factory $factory)
    {
        $this->cookie = $factory;

        return $this;
    }

    /**
     * Get cookie
     *
     * If no cookie has been set, this method will
     * set and return a default cookie, if any such
     * value is available
     *
     * @see getDefaultCookie()
     *
     * @return Factory|null cookie or null if none cookie has been set
     */
    public function getCookie(): ?Factory
    {
        if (!$this->hasCookie()) {
            $this->setCookie($this->getDefaultCookie());
        }
        return $this->cookie;
    }

    /**
     * Check if cookie has been set
     *
     * @return bool True if cookie has been set, false if not
     */
    public function hasCookie(): bool
    {
        return isset($this->cookie);
    }

    /**
     * Get a default cookie value, if any is available
     *
     * @return Factory|null A default cookie value or Null if no default value is available
     */
    public function getDefaultCookie(): ?Factory
    {
        return Cookie::getFacadeRoot();
    }
}
