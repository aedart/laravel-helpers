<?php

namespace Aedart\Laravel\Helpers\Traits\Session;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Session;

/**
 * <h1>Session Manager Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Session\SessionManagerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Session
 */
trait SessionManagerTrait
{
    /**
     * Instance of Laravel's Session Manager
     *
     * @var SessionManager|null
     */
    protected $sessionManager = null;

    /**
     * Set the given session manager
     *
     * @param SessionManager $manager Instance of Laravel's Session Manager
     *
     * @return void
     */
    public function setSessionManager(SessionManager $manager)
    {
        $this->sessionManager = $manager;
    }

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
    public function getSessionManager()
    {
        if (!$this->hasSessionManager() && $this->hasDefaultSessionManager()) {
            $this->setSessionManager($this->getDefaultSessionManager());
        }
        return $this->sessionManager;
    }

    /**
     * Get a default session manager value, if any is available
     *
     * @return SessionManager|null A default session manager value or Null if no default value is available
     */
    public function getDefaultSessionManager()
    {
        return Session::getFacadeRoot();
    }

    /**
     * Check if session manager has been set
     *
     * @return bool True if session manager has been set, false if not
     */
    public function hasSessionManager()
    {
        return isset($this->sessionManager);
    }

    /**
     * Check if a default session manager is available or not
     *
     * @return bool True of a default session manager is available, false if not
     */
    public function hasDefaultSessionManager()
    {
        $default = $this->getDefaultSessionManager();
        return isset($default);
    }
}