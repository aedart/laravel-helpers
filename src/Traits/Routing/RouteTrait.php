<?php

namespace Aedart\Laravel\Helpers\Traits\Routing;

use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

/**
 * <h1>Route Trait</h1>
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Routing\RouteAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
trait RouteTrait
{
    /**
     * Instance of a Route Registrar
     *
     * @var Registrar|null
     */
    protected $route = null;

    /**
     * Set the given route
     *
     * @param Registrar $registrar Instance of a Route Registrar
     *
     * @return void
     */
    public function setRoute(Registrar $registrar)
    {
        $this->route = $registrar;
    }

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
    public function getRoute()
    {
        if (!$this->hasRoute() && $this->hasDefaultRoute()) {
            $this->setRoute($this->getDefaultRoute());
        }
        return $this->route;
    }

    /**
     * Get a default route value, if any is available
     *
     * @return Registrar|null A default route value or Null if no default value is available
     */
    public function getDefaultRoute()
    {
        return Route::getFacadeRoot();
    }

    /**
     * Check if route has been set
     *
     * @return bool True if route has been set, false if not
     */
    public function hasRoute()
    {
        if (!is_null($this->route)) {
            return true;
        }
        return false;
    }

    /**
     * Check if a default route is available or not
     *
     * @return bool True of a default route is available, false if not
     */
    public function hasDefaultRoute()
    {
        if (!is_null($this->getDefaultRoute())) {
            return true;
        }
        return false;
    }
}