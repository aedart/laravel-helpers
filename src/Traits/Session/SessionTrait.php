<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Session;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as SessionFacade;

/**
 * @deprecated Use \Aedart\Support\Helpers\Session\SessionTrait, in aedart/athenaeum package
 *
 * Session Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Session\SessionAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Session
 */
trait SessionTrait
{
    /**
     * Session Instance
     *
     * @var Session|null
     */
    protected $session = null;

    /**
     * Set session
     *
     * @param Session|null $session Session Instance
     *
     * @return self
     */
    public function setSession(?Session $session)
    {
        $this->session = $session;

        return $this;
    }

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
    public function getSession(): ?Session
    {
        if (!$this->hasSession()) {
            $this->setSession($this->getDefaultSession());
        }
        return $this->session;
    }

    /**
     * Check if session has been set
     *
     * @return bool True if session has been set, false if not
     */
    public function hasSession(): bool
    {
        return isset($this->session);
    }

    /**
     * Get a default session value, if any is available
     *
     * @return Session|null A default session value or Null if no default value is available
     */
    public function getDefaultSession(): ?Session
    {
        // By default, the Session Facade does not return the
        // any actual session instance, but rather an
        // instance of \Illuminate\Session\SessionManager.
        // Therefore, we make sure only to obtain its
        // "driver", to make sure that its only the connection
        // instance that we obtain.
        $manager = SessionFacade::getFacadeRoot();
        if (isset($manager)) {
            return $manager->driver();
        }
        return $manager;
    }
}
