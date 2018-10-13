<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Routing;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

/**
 * @deprecated Use \Aedart\Support\Helpers\Routing\UrlGeneratorTrait, in aedart/athenaeum package
 *
 * URL Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Routing\URLAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
trait URLTrait
{
    /**
     * Url Generator Instance
     *
     * @var UrlGenerator|null
     */
    protected $url = null;

    /**
     * Set url
     *
     * @param UrlGenerator|null $generator Url Generator Instance
     *
     * @return self
     */
    public function setUrl(?UrlGenerator $generator)
    {
        $this->url = $generator;

        return $this;
    }

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
    public function getUrl(): ?UrlGenerator
    {
        if (!$this->hasUrl()) {
            $this->setUrl($this->getDefaultUrl());
        }
        return $this->url;
    }

    /**
     * Check if url has been set
     *
     * @return bool True if url has been set, false if not
     */
    public function hasUrl(): bool
    {
        return isset($this->url);
    }

    /**
     * Get a default url value, if any is available
     *
     * @return UrlGenerator|null A default url value or Null if no default value is available
     */
    public function getDefaultUrl(): ?UrlGenerator
    {
        return URL::getFacadeRoot();
    }
}
