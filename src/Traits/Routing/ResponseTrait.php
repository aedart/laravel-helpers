<?php

namespace Aedart\Laravel\Helpers\Traits\Routing;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Response;

/**
 * <h1>Response Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Routing\ResponseAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
trait ResponseTrait
{
    /**
     * Instance of a Response Factory
     *
     * @var ResponseFactory|null
     */
    protected $response = null;

    /**
     * Set the given response
     *
     * @param ResponseFactory $factory Instance of a Response Factory
     *
     * @return void
     */
    public function setResponse(ResponseFactory $factory)
    {
        $this->response = $factory;
    }

    /**
     * Get the given response
     *
     * If no response has been set, this method will
     * set and return a default response, if any such
     * value is available
     *
     * @see getDefaultResponse()
     *
     * @return ResponseFactory|null response or null if none response has been set
     */
    public function getResponse()
    {
        if (!$this->hasResponse() && $this->hasDefaultResponse()) {
            $this->setResponse($this->getDefaultResponse());
        }
        return $this->response;
    }

    /**
     * Get a default response value, if any is available
     *
     * @return ResponseFactory|null A default response value or Null if no default value is available
     */
    public function getDefaultResponse()
    {
        return Response::getFacadeRoot();
    }

    /**
     * Check if response has been set
     *
     * @return bool True if response has been set, false if not
     */
    public function hasResponse()
    {
        return isset($this->response);
    }

    /**
     * Check if a default response is available or not
     *
     * @return bool True of a default response is available, false if not
     */
    public function hasDefaultResponse()
    {
        $default = $this->getDefaultResponse();
        return isset($default);
    }
}