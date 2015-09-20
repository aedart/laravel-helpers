<?php
use Aedart\Laravel\Helpers\Contracts\Routing\RouteAware;
use Aedart\Laravel\Helpers\Traits\Routing\RouteTrait;

/**
 * Class RouteCompatibilityTest
 *
 * @group compatibility
 * @group routing
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class RouteCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyRouteContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return RouteAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return RouteTrait::class;
    }
}

class DummyRouteContainer implements RouteAware{
    use RouteTrait;
}