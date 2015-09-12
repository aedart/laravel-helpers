<?php namespace Aedart\Laravel\Helpers\Traits;

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;

/**
 * <h1>Auth Manager Trait</h1>
 *
 * @see \Aedart\Facade\Helpers\Contracts\AuthManagerAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
trait AuthManagerTrait {

    /**
     * Instance of the Authentication Manager
     *
     * @var AuthManager|null
     */
    protected $authManager = null;

    /**
     * Set the given auth manager
     *
     * @param AuthManager $manager Instance of the Authentication Manager
     *
     * @return void
     */
    public function setAuthManager(AuthManager $manager) {
        $this->authManager = $manager;
    }

    /**
     * Get the given auth manager
     *
     * If no auth manager has been set, this method will
     * set and return a default auth manager, if any such
     * value is available
     *
     * @see getDefaultAuthManager()
     *
     * @return AuthManager|null auth manager or null if none auth manager has been set
     */
    public function getAuthManager() {
        if (!$this->hasAuthManager() && $this->hasDefaultAuthManager()) {
            $this->setAuthManager($this->getDefaultAuthManager());
        }
        return $this->authManager;
    }

    /**
     * Get a default auth manager value, if any is available
     *
     * @return AuthManager|null A default auth manager value or Null if no default value is available
     */
    public function getDefaultAuthManager() {
        return Auth::getFacadeRoot();
    }

    /**
     * Check if auth manager has been set
     *
     * @return bool True if auth manager has been set, false if not
     */
    public function hasAuthManager() {
        if (!is_null($this->authManager)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default auth manager is available or not
     *
     * @return bool True of a default auth manager is available, false if not
     */
    public function hasDefaultAuthManager() {
        if (!is_null($this->getDefaultAuthManager())) {
            return true;
        }
        return false;
    }
}