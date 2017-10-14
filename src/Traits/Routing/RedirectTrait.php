<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Routing;

use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

/**
 * Redirect Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Routing\RedirectAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
trait RedirectTrait
{
    /**
     * Redirector Instance
     *
     * @var Redirector|null
     */
    protected $redirect = null;

    /**
     * Set redirect
     *
     * @param Redirector|null $redirector Redirector Instance
     *
     * @return self
     */
    public function setRedirect(?Redirector $redirector)
    {
        $this->redirect = $redirector;

        return $this;
    }

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
    public function getRedirect(): ?Redirector
    {
        if (!$this->hasRedirect()) {
            $this->setRedirect($this->getDefaultRedirect());
        }
        return $this->redirect;
    }

    /**
     * Check if redirect has been set
     *
     * @return bool True if redirect has been set, false if not
     */
    public function hasRedirect(): bool
    {
        return isset($this->redirect);
    }

    /**
     * Get a default redirect value, if any is available
     *
     * @return Redirector|null A default redirect value or Null if no default value is available
     */
    public function getDefaultRedirect(): ?Redirector
    {
        return Redirect::getFacadeRoot();
    }
}