<?php

namespace Aedart\Laravel\Helpers\Contracts\Routing;

use Illuminate\Contracts\Routing\ResponseFactory;

/**
 * Response Aware
 *
 * @see \Illuminate\Contracts\Routing\ResponseFactory
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Routing
 */
interface ResponseAware
{
    /**
     * Set response
     *
     * @param ResponseFactory|null $factory Response Factory Instance
     *
     * @return self
     */
    public function setResponse(?ResponseFactory $factory);

    /**
     * Get response
     *
     * If no response has been set, this method will
     * set and return a default response, if any such
     * value is available
     *
     * @see getDefaultResponse()
     *
     * @return ResponseFactory|null response or null if none response has been set
     */
    public function getResponse(): ?ResponseFactory;

    /**
     * Check if response has been set
     *
     * @return bool True if response has been set, false if not
     */
    public function hasResponse(): bool;

    /**
     * Get a default response value, if any is available
     *
     * @return ResponseFactory|null A default response value or Null if no default value is available
     */
    public function getDefaultResponse(): ?ResponseFactory;
}