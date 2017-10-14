<?php

namespace Aedart\Laravel\Helpers\Contracts\Routing;

use Illuminate\Contracts\Routing\Registrar;

/**
 * Route Aware
 *
 * @see \Illuminate\Contracts\Routing\Registrar
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Contracts\Routing
 */
interface RouteAware
{
    /**
     * Set route
     *
     * @param Registrar|null $registrar Route Registrar Instance
     *
     * @return self
     */
    public function setRoute(?Registrar $registrar);

    /**
     * Get route
     *
     * If no route has been set, this method will
     * set and return a default route, if any such
     * value is available
     *
     * @see getDefaultRoute()
     *
     * @return Registrar|null route or null if none route has been set
     */
    public function getRoute(): ?Registrar;

    /**
     * Check if route has been set
     *
     * @return bool True if route has been set, false if not
     */
    public function hasRoute(): bool;

    /**
     * Get a default route value, if any is available
     *
     * @return Registrar|null A default route value or Null if no default value is available
     */
    public function getDefaultRoute(): ?Registrar;
}