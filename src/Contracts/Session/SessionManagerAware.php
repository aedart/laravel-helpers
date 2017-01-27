<?php

namespace Aedart\Laravel\Helpers\Contracts\Session;

use Illuminate\Session\SessionManager;

/**
 * <h1>Session manager Aware</h1>
 *
 * Components are able to specify and obtain Laravel's Session Manager
 *
 * @see \Illuminate\Session\SessionManager
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Session
 */
interface SessionManagerAware
{
    /**
     * Set the given session manager
     *
     * @param SessionManager $manager Instance of Laravel's Session Manager
     *
     * @return void
     */
    public function setSessionManager(SessionManager $manager);

    /**
     * Get the given session manager
     *
     * If no session manager has been set, this method will
     * set and return a default session manager, if any such
     * value is available
     *
     * @see getDefaultSessionManager()
     *
     * @return SessionManager|null session manager or null if none session manager has been set
     */
    public function getSessionManager();

    /**
     * Get a default session manager value, if any is available
     *
     * @return SessionManager|null A default session manager value or Null if no default value is available
     */
    public function getDefaultSessionManager();

    /**
     * Check if session manager has been set
     *
     * @return bool True if session manager has been set, false if not
     */
    public function hasSessionManager();

    /**
     * Check if a default session manager is available or not
     *
     * @return bool True of a default session manager is available, false if not
     */
    public function hasDefaultSessionManager();
}