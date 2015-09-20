<?php
use Aedart\Laravel\Helpers\Contracts\Foundation\AppAware;
use Aedart\Laravel\Helpers\Traits\Foundation\AppTrait;

/**
 * Class AppCompatibilityTest
 *
 * @group compatibility
 * @group foundation
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AppCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyAppContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return AppAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return AppTrait::class;
    }
}

class DummyAppContainer implements AppAware {
    use AppTrait;
}