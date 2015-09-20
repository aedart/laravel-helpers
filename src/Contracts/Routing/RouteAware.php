<?php namespace Aedart\Laravel\Helpers\Contracts\Routing;

use Illuminate\Contracts\Routing\Registrar;

/**
 * <h1>Response Aware</h1>
 *
 * Components are able to specify and obtain a Route Registrar
 * utility component - responsible for keeping track of the routes!
 *
 * @see \Illuminate\Contracts\Routing\Registrar
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
interface RouteAware {

    /**
     * Set the given route
     *
     * @param Registrar $registrar Instance of a Route Registrar
     *
     * @return void
     */
    public function setRoute(Registrar $registrar);

    /**
     * Get the given route
     *
     * If no route has been set, this method will
     * set and return a default route, if any such
     * value is available
     *
     * @see getDefaultRoute()
     *
     * @return Registrar|null route or null if none route has been set
     */
    public function getRoute();

    /**
     * Get a default route value, if any is available
     *
     * @return Registrar|null A default route value or Null if no default value is available
     */
    public function getDefaultRoute();

    /**
     * Check if route has been set
     *
     * @return bool True if route has been set, false if not
     */
    public function hasRoute();

    /**
     * Check if a default route is available or not
     *
     * @return bool True of a default route is available, false if not
     */
    public function hasDefaultRoute();
}