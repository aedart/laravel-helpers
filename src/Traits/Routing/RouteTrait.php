<?php
declare(strict_types=1);

namespace Aedart\Laravel\Helpers\Traits\Routing;

use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\Facades\Route;

/**
 * Route Trait
 *
 * @see \Aedart\Laravel\Helpers\Contracts\Routing\RouteAware
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Laravel\Helpers\Traits\Routing
 */
trait RouteTrait
{
    /**
     * Route Registrar Instance
     *
     * @var Registrar|null
     */
    protected $route = null;

    /**
     * Set route
     *
     * @param Registrar|null $registrar Route Registrar Instance
     *
     * @return self
     */
    public function setRoute(?Registrar $registrar)
    {
        $this->route = $registrar;

        return $this;
    }

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
    public function getRoute(): ?Registrar
    {
        if (!$this->hasRoute()) {
            $this->setRoute($this->getDefaultRoute());
        }
        return $this->route;
    }

    /**
     * Check if route has been set
     *
     * @return bool True if route has been set, false if not
     */
    public function hasRoute(): bool
    {
        return isset($this->route);
    }

    /**
     * Get a default route value, if any is available
     *
     * @return Registrar|null A default route value or Null if no default value is available
     */
    public function getDefaultRoute(): ?Registrar
    {
        return Route::getFacadeRoot();
    }
}