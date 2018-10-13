<?php

namespace Aedart\Laravel\Helpers\Contracts\Routing;

use Illuminate\Routing\Redirector;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Routing\RedirectAware, in aedart/athenaeum package
 *
 * Redirect Aware
 *
 * @see \Illuminate\Routing\Redirector
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Routing
 */
interface RedirectAware
{
    /**
     * Set redirect
     *
     * @param Redirector|null $redirector Redirector Instance
     *
     * @return self
     */
    public function setRedirect(?Redirector $redirector);

    /**
     * Get redirect
     *
     * If no redirect has been set, this method will
     * set and return a default redirect, if any such
     * value is available
     *
     * @see getDefaultRedirect()
     *
     * @return Redirector|null redirect or null if none redirect has been set
     */
    public function getRedirect(): ?Redirector;

    /**
     * Check if redirect has been set
     *
     * @return bool True if redirect has been set, false if not
     */
    public function hasRedirect(): bool;

    /**
     * Get a default redirect value, if any is available
     *
     * @return Redirector|null A default redirect value or Null if no default value is available
     */
    public function getDefaultRedirect(): ?Redirector;
}
