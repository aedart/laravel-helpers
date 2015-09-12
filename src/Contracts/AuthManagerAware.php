<?php  namespace Aedart\Laravel\Helpers\Contracts;

use Illuminate\Auth\AuthManager;

/**
 * <h1>Auth Manager Aware</h1>
 *
 * Components are able to specify and obtain the authentication manager
 *
 * @see \Illuminate\Auth\AuthManager
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Facade\Helpers\Traits
 */
interface AuthManagerAware {

    /**
     * Set the given auth manager
     *
     * @param AuthManager $manager Instance of the Authentication Manager
     *
     * @return void
     */
    public function setAuthManager(AuthManager $manager);

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
    public function getAuthManager();

    /**
     * Get a default auth manager value, if any is available
     *
     * @return AuthManager|null A default auth manager value or Null if no default value is available
     */
    public function getDefaultAuthManager();

    /**
     * Check if auth manager has been set
     *
     * @return bool True if auth manager has been set, false if not
     */
    public function hasAuthManager();

    /**
     * Check if a default auth manager is available or not
     *
     * @return bool True of a default auth manager is available, false if not
     */
    public function hasDefaultAuthManager();
}