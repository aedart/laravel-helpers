<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Cookie;

use Illuminate\Contracts\Cookie\QueueingFactory;
use Illuminate\Support\Facades\Cookie;

/**
 * Queueing Cookie Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Cookie\QueueingCookieAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Cookie
 */
trait QueueingCookieTrait
{
    /**
     * Queueing Cookie Factory instance
     *
     * @var QueueingFactory|null
     */
    protected $queueingCookie = null;

    /**
     * Set queueing cookie
     *
     * @param QueueingFactory|null $factory Queueing Cookie Factory instance
     *
     * @return self
     */
    public function setQueueingCookie(?QueueingFactory $factory)
    {
        $this->queueingCookie = $factory;

        return $this;
    }

    /**
     * Get queueing cookie
     *
     * If no queueing cookie has been set, this method will
     * set and return a default queueing cookie, if any such
     * value is available
     *
     * @see getDefaultQueueingCookie()
     *
     * @return QueueingFactory|null queueing cookie or null if none queueing cookie has been set
     */
    public function getQueueingCookie(): ?QueueingFactory
    {
        if (!$this->hasQueueingCookie()) {
            $this->setQueueingCookie($this->getDefaultQueueingCookie());
        }
        return $this->queueingCookie;
    }

    /**
     * Check if queueing cookie has been set
     *
     * @return bool True if queueing cookie has been set, false if not
     */
    public function hasQueueingCookie(): bool
    {
        return isset($this->queueingCookie);
    }

    /**
     * Get a default queueing cookie value, if any is available
     *
     * @return QueueingFactory|null A default queueing cookie value or Null if no default value is available
     */
    public function getDefaultQueueingCookie(): ?QueueingFactory
    {
        return Cookie::getFacadeRoot();
    }
}