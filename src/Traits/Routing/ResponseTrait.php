<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Routing;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Response;

/**
 * @deprecated Use \Aedart\Support\Helpers\Routing\ResponseFactoryTrait, in aedart/athenaeum package
 *
 * Response Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Routing\ResponseAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
trait ResponseTrait
{
    /**
     * Response Factory Instance
     *
     * @var ResponseFactory|null
     */
    protected $response = null;

    /**
     * Set response
     *
     * @param ResponseFactory|null $factory Response Factory Instance
     *
     * @return self
     */
    public function setResponse(?ResponseFactory $factory)
    {
        $this->response = $factory;

        return $this;
    }

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
    public function getResponse(): ?ResponseFactory
    {
        if (!$this->hasResponse()) {
            $this->setResponse($this->getDefaultResponse());
        }
        return $this->response;
    }

    /**
     * Check if response has been set
     *
     * @return bool True if response has been set, false if not
     */
    public function hasResponse(): bool
    {
        return isset($this->response);
    }

    /**
     * Get a default response value, if any is available
     *
     * @return ResponseFactory|null A default response value or Null if no default value is available
     */
    public function getDefaultResponse(): ?ResponseFactory
    {
        return Response::getFacadeRoot();
    }
}
