<?php

namespace Aedart\Laravel\Helpers\Traits\Routing;

use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

/**
 * <h1>Redirect Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Routing\RedirectAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
trait RedirectTrait
{
    /**
     * Instance of Laravel's Redirector
     *
     * @var Redirector|null
     */
    protected $redirect = null;

    /**
     * Set the given redirect
     *
     * @param Redirector $redirector Instance of Laravel's Redirector
     *
     * @return void
     */
    public function setRedirect(Redirector $redirector)
    {
        $this->redirect = $redirector;
    }

    /**
     * Get the given redirect
     *
     * If no redirect has been set, this method will
     * set and return a default redirect, if any such
     * value is available
     *
     * @see getDefaultRedirect()
     *
     * @return Redirector|null redirect or null if none redirect has been set
     */
    public function getRedirect()
    {
        if (!$this->hasRedirect() && $this->hasDefaultRedirect()) {
            $this->setRedirect($this->getDefaultRedirect());
        }
        return $this->redirect;
    }

    /**
     * Get a default redirect value, if any is available
     *
     * @return Redirector|null A default redirect value or Null if no default value is available
     */
    public function getDefaultRedirect()
    {
        static $redirect;
        return isset($redirect) ? $redirect : $redirect = Redirect::getFacadeRoot();
    }

    /**
     * Check if redirect has been set
     *
     * @return bool True if redirect has been set, false if not
     */
    public function hasRedirect()
    {
        return isset($this->redirect);
    }

    /**
     * Check if a default redirect is available or not
     *
     * @return bool True of a default redirect is available, false if not
     */
    public function hasDefaultRedirect()
    {
        $default = $this->getDefaultRedirect();
        return isset($default);
    }
}