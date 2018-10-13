<?php

namespace Aedart\Laravel\Helpers\Contracts\Routing;

use Illuminate\Contracts\Routing\UrlGenerator;

/**
 * @deprecated Use \Aedart\Contracts\Support\Helpers\Routing\UrlGeneratorAware, in aedart/athenaeum package
 *
 * URL Aware
 *
 * @see \Illuminate\Contracts\Routing\UrlGenerator
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Routing
 */
interface URLAware
{
    /**
     * Set url
     *
     * @param UrlGenerator|null $generator Url Generator Instance
     *
     * @return self
     */
    public function setUrl(?UrlGenerator $generator);

    /**
     * Get url
     *
     * If no url has been set, this method will
     * set and return a default url, if any such
     * value is available
     *
     * @see getDefaultUrl()
     *
     * @return UrlGenerator|null url or null if none url has been set
     */
    public function getUrl(): ?UrlGenerator;

    /**
     * Check if url has been set
     *
     * @return bool True if url has been set, false if not
     */
    public function hasUrl(): bool;

    /**
     * Get a default url value, if any is available
     *
     * @return UrlGenerator|null A default url value or Null if no default value is available
     */
    public function getDefaultUrl(): ?UrlGenerator;
}
