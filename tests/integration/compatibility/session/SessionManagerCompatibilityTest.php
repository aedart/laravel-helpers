<?php
use Aedart\Laravel\Helpers\Contracts\Session\SessionManagerAware;
use Aedart\Laravel\Helpers\Traits\Session\SessionManagerTrait;

/**
 * Class SessionManagerCompatibilityTest
 *
 * @group compatibility
 * @group session
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class SessionManagerCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummySessionManagerContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return SessionManagerAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return SessionManagerTrait::class;
    }
}

class DummySessionManagerContainer implements SessionManagerAware{
    use SessionManagerTrait;
}