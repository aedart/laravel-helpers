<?php

namespace Aedart\Laravel\Helpers\Contracts\Routing;

use Illuminate\Routing\Redirector;

/**
 * <h1>Redirect Aware</h1>
 *
 * Components are able to specify and obtain a Laravel Redirector
 * utility component.
 *
 * @see \Illuminate\Routing\Redirector
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
interface RedirectAware
{
    /**
     * Set the given redirect
     *
     * @param Redirector $redirector Instance of Laravel's Redirector
     *
     * @return void
     */
    public function setRedirect(Redirector $redirector);

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
    public function getRedirect();

    /**
     * Get a default redirect value, if any is available
     *
     * @return Redirector|null A default redirect value or Null if no default value is available
     */
    public function getDefaultRedirect();

    /**
     * Check if redirect has been set
     *
     * @return bool True if redirect has been set, false if not
     */
    public function hasRedirect();

    /**
     * Check if a default redirect is available or not
     *
     * @return bool True of a default redirect is available, false if not
     */
    public function hasDefaultRedirect();
}