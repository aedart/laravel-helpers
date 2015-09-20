<?php namespace Aedart\Laravel\Helpers\Traits\Session;

use Illuminate\Session\SessionInterface;
use Illuminate\Support\Facades\Session;

/**
 * <h1>Session Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Session\SessionAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Session
 */
trait SessionTrait {

    /**
     * Instance of a Session
     *
     * @var SessionInterface|null
     */
    protected $session = null;

    /**
     * Set the given session
     *
     * @param SessionInterface $session Instance of a Session
     *
     * @return void
     */
    public function setSession(SessionInterface $session) {
        $this->session = $session;
    }

    /**
     * Get the given session
     *
     * If no session has been set, this method will
     * set and return a default session, if any such
     * value is available
     *
     * @see getDefaultSession()
     *
     * @return SessionInterface|null session or null if none session has been set
     */
    public function getSession() {
        if (!$this->hasSession() && $this->hasDefaultSession()) {
            $this->setSession($this->getDefaultSession());
        }
        return $this->session;
    }

    /**
     * Get a default session value, if any is available
     *
     * @return SessionInterface|null A default session value or Null if no default value is available
     */
    public function getDefaultSession() {
        // By default, the Session Facade does not return the
        // any actual session instance, but rather an
        // instance of \Illuminate\Session\SessionManager.
        // Therefore, we make sure only to obtain its
        // "driver", to make sure that its only the connection
        // instance that we obtain.
        $manager = Session::getFacadeRoot();
        if(!is_null($manager)){
            return $manager->driver();
        }
        return $manager;
    }

    /**
     * Check if session has been set
     *
     * @return bool True if session has been set, false if not
     */
    public function hasSession() {
        if (!is_null($this->session)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default session is available or not
     *
     * @return bool True of a default session is available, false if not
     */
    public function hasDefaultSession() {
        if (!is_null($this->getDefaultSession())) {
            return true;
        }
        return false;
    }
}