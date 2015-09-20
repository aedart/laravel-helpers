<?php
use Aedart\Laravel\Helpers\Contracts\Logging\LogWriterAware;
use Aedart\Laravel\Helpers\Traits\Logging\LogWriterTrait;

/**
 * Class LogWriterCompatibilityTest
 *
 * @group compatibility
 * @group logging
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class LogWriterCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyLogWriterContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return LogWriterAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return LogWriterTrait::class;
    }
}

class DummyLogWriterContainer implements LogWriterAware {
    use LogWriterTrait;
}