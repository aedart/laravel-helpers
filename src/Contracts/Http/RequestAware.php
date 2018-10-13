<?php

namespace Aedart\Laravel\Helpers\Contracts\Http;

use Illuminate\Http\Request;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Http\RequestAware, in aedart/athenaeum package
 *
 * Http Request Aware
 *
 * @see \Illuminate\Http\Request
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Http
 */
interface RequestAware
{
    /**
     * Set request
     *
     * @param Request|null $request Http Request Instance
     *
     * @return self
     */
    public function setRequest(?Request $request);

    /**
     * Get request
     *
     * If no request has been set, this method will
     * set and return a default request, if any such
     * value is available
     *
     * @see getDefaultRequest()
     *
     * @return Request|null request or null if none request has been set
     */
    public function getRequest(): ?Request;

    /**
     * Check if request has been set
     *
     * @return bool True if request has been set, false if not
     */
    public function hasRequest(): bool;

    /**
     * Get a default request value, if any is available
     *
     * @return Request|null A default request value or Null if no default value is available
     */
    public function getDefaultRequest(): ?Request;
}
