<?php

namespace Aedart\Laravel\Helpers\Contracts\Session;

use Illuminate\Contracts\Session\Session;

/**
 * Session Aware
 *
 * @see \Illuminate\Contracts\Session\Session
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Session
 */
interface SessionAware
{
    /**
     * Set session
     *
     * @param Session|null $session Session Instance
     *
     * @return self
     */
    public function setSession(?Session $session);

    /**
     * Get session
     *
     * If no session has been set, this method will
     * set and return a default session, if any such
     * value is available
     *
     * @see getDefaultSession()
     *
     * @return Session|null session or null if none session has been set
     */
    public function getSession(): ?Session;

    /**
     * Check if session has been set
     *
     * @return bool True if session has been set, false if not
     */
    public function hasSession(): bool;

    /**
     * Get a default session value, if any is available
     *
     * @return Session|null A default session value or Null if no default value is available
     */
    public function getDefaultSession(): ?Session;
}