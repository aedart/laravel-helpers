<?php

namespace Aedart\Laravel\Helpers\Traits\Routing;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

/**
 * <h1>URL Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Routing\URLAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
trait URLTrait
{
    /**
     * Instance of a Url Generator
     *
     * @var UrlGenerator|null
     */
    protected $URL = null;

    /**
     * Set the given url
     *
     * @param UrlGenerator $generator Instance of a Url Generator
     *
     * @return void
     */
    public function setURL(UrlGenerator $generator)
    {
        $this->URL = $generator;
    }

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
    public function getURL()
    {
        if (!$this->hasURL() && $this->hasDefaultURL()) {
            $this->setURL($this->getDefaultURL());
        }
        return $this->URL;
    }

    /**
     * Get a default url value, if any is available
     *
     * @return UrlGenerator|null A default url value or Null if no default value is available
     */
    public function getDefaultURL()
    {
        return URL::getFacadeRoot();
    }

    /**
     * Check if url has been set
     *
     * @return bool True if url has been set, false if not
     */
    public function hasURL()
    {
        if (!is_null($this->URL)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default url is available or not
     *
     * @return bool True of a default url is available, false if not
     */
    public function hasDefaultURL()
    {
        if (!is_null($this->getDefaultURL())) {
            return true;
        }
        return false;
    }
}