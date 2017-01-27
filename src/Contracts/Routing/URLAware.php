<?php

namespace Aedart\Laravel\Helpers\Contracts\Routing;

use Illuminate\Contracts\Routing\UrlGenerator;

/**
 * <h1>URL Aware</h1>
 *
 * Components are able to specify and obtain a Url generator
 * utility component
 *
 * @see \Illuminate\Contracts\Routing\UrlGenerator
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
interface URLAware
{
    /**
     * Set the given url
     *
     * @param UrlGenerator $generator Instance of a Url Generator
     *
     * @return void
     */
    public function setURL(UrlGenerator $generator);

    /**
     * Get the given url
     *
     * If no url has been set, this method will
     * set and return a default url, if any such
     * value is available
     *
     * @see getDefaultURL()
     *
     * @return UrlGenerator|null url or null if none url has been set
     */
    public function getURL();

    /**
     * Get a default url value, if any is available
     *
     * @return UrlGenerator|null A default url value or Null if no default value is available
     */
    public function getDefaultURL();

    /**
     * Check if url has been set
     *
     * @return bool True if url has been set, false if not
     */
    public function hasURL();

    /**
     * Check if a default url is available or not
     *
     * @return bool True of a default url is available, false if not
     */
    public function hasDefaultURL();
}