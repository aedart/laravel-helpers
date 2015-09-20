<?php namespace Aedart\Laravel\Helpers\Contracts\Routing;

use Illuminate\Contracts\Routing\ResponseFactory;

/**
 * <h1>Response Aware</h1>
 *
 * Components are able to specify and obtain a Response Factory
 * utility component.
 *
 * @see \Illuminate\Contracts\Routing\ResponseFactory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
interface ResponseAware {

    /**
     * Set the given response
     *
     * @param ResponseFactory $factory Instance of a Response Factory
     *
     * @return void
     */
    public function setResponse(ResponseFactory $factory);

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
    public function getResponse();

    /**
     * Get a default response value, if any is available
     *
     * @return ResponseFactory|null A default response value or Null if no default value is available
     */
    public function getDefaultResponse();

    /**
     * Check if response has been set
     *
     * @return bool True if response has been set, false if not
     */
    public function hasResponse();

    /**
     * Check if a default response is available or not
     *
     * @return bool True of a default response is available, false if not
     */
    public function hasDefaultResponse();
}