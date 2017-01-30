<?php

namespace Aedart\Laravel\Helpers\Traits\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;

/**
 * <h1>Request Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Http\RequestAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Http
 */
trait RequestTrait
{
    /**
     * Instance of Laravel's Request
     *
     * @var Request|null
     */
    protected $request = null;

    /**
     * Set the given request
     *
     * @param Request $request Instance of Laravel's Request
     *
     * @return void
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

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
    public function getRequest()
    {
        if (!$this->hasRequest() && $this->hasDefaultRequest()) {
            $this->setRequest($this->getDefaultRequest());
        }
        return $this->request;
    }

    /**
     * Get a default request value, if any is available
     *
     * @return Request|null A default request value or Null if no default value is available
     */
    public function getDefaultRequest()
    {
        return RequestFacade::getFacadeRoot();
    }

    /**
     * Check if request has been set
     *
     * @return bool True if request has been set, false if not
     */
    public function hasRequest()
    {
        return isset($this->request);
    }

    /**
     * Check if a default request is available or not
     *
     * @return bool True of a default request is available, false if not
     */
    public function hasDefaultRequest()
    {
        $default = $this->getDefaultRequest();
        return isset($default);
    }
}