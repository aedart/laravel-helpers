<?php
use Aedart\Laravel\Helpers\Contracts\Auth\PasswordBrokerFactoryAware;
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerFactoryTrait;

/**
 * Class PasswordBrokerFactoryCompatibilityTest
 *
 * @group compatibility
 * @group auth
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PasswordBrokerFactoryCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyPasswordBrokerFactoryContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return PasswordBrokerFactoryAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return PasswordBrokerFactoryTrait::class;
    }
}

class DummyPasswordBrokerFactoryContainer implements PasswordBrokerFactoryAware {
    use PasswordBrokerFactoryTrait;
}