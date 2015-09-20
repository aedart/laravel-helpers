<?php
use Aedart\Laravel\Helpers\Contracts\Session\SessionAware;
use Aedart\Laravel\Helpers\Traits\Session\SessionTrait;

/**
 * Class SessionCompatibilityTest
 *
 * @group compatibility
 * @group session
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class SessionCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummySessionContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return SessionAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return SessionTrait::class;
    }
}

class DummySessionContainer implements SessionAware{
    use SessionTrait;
}