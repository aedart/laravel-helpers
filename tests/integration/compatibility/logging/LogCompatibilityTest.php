<?php
use Aedart\Laravel\Helpers\Contracts\Logging\LogAware;
use Aedart\Laravel\Helpers\Traits\Logging\LogTrait;

/**
 * Class LogCompatibilityTest
 *
 * @group compatibility
 * @group logging
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class LogCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyLogContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return LogAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return LogTrait::class;
    }
}

class DummyLogContainer implements LogAware {
    use LogTrait;
}