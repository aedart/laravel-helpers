<?php

namespace Aedart\Laravel\Helpers\Contracts\Http;

use Illuminate\Http\Request;

/**
 * <h1>Request Aware</h1>
 *
 * Components are able to specify and obtain a Laravel Request
 * utility component.
 *
 * @see \Illuminate\Http\Request
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Http
 */
interface RequestAware
{
    /**
     * Set the given request
     *
     * @param Request $request Instance of Laravel's Request
     *
     * @return void
     */
    public function setRequest(Request $request);

    /**
     * Get the given request
     *
     * If no request has been set, this method will
     * set and return a default request, if any such
     * value is available
     *
     * @see getDefaultRequest()
     *
     * @return Request|null request or null if none request has been set
     */
    public function getRequest();

    /**
     * Get a default request value, if any is available
     *
     * @return Request|null A default request value or Null if no default value is available
     */
    public function getDefaultRequest();

    /**
     * Check if request has been set
     *
     * @return bool True if request has been set, false if not
     */
    public function hasRequest();

    /**
     * Check if a default request is available or not
     *
     * @return bool True of a default request is available, false if not
     */
    public function hasDefaultRequest();
}