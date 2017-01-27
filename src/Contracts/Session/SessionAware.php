<?php

namespace Aedart\Laravel\Helpers\Contracts\Session;

use Illuminate\Contracts\Session\Session;

/**
 * <h1>Session Aware</h1>
 *
 * Components are able to specify and obtain a session instance
 *
 * @see \Illuminate\Contracts\Session\Session
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Session
 */
interface SessionAware
{
    /**
     * Set the given session
     *
     * @param Session $session Instance of a Session
     *
     * @return void
     */
    public function setSession(Session $session);

    /**
     * Get the given session
     *
     * If no session has been set, this method will
     * set and return a default session, if any such
     * value is available
     *
     * @see getDefaultSession()
     *
     * @return Session|null session or null if none session has been set
     */
    public function getSession();

    /**
     * Get a default session value, if any is available
     *
     * @return Session|null A default session value or Null if no default value is available
     */
    public function getDefaultSession();

    /**
     * Check if session has been set
     *
     * @return bool True if session has been set, false if not
     */
    public function hasSession();

    /**
     * Check if a default session is available or not
     *
     * @return bool True of a default session is available, false if not
     */
    public function hasDefaultSession();
}