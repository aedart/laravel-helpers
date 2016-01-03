<?php
use Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerManagerAware;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerManagerTrait;

/**
 * Class PasswordBrokerManagerCompatibilityTest
 *
 * @group compatibility
 * @group auth
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PasswordBrokerManagerCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyPasswordBrokerManagerContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return PasswordBrokerManagerAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return PasswordBrokerManagerTrait::class;
    }
}

class DummyPasswordBrokerManagerContainer implements PasswordBrokerManagerAware {
    use PasswordBrokerManagerTrait;
}