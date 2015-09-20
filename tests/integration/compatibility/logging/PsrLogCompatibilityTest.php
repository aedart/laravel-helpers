<?php
use Aedart\Laravel\Helpers\Contracts\Logging\PsrLogAware;
use Aedart\Laravel\Helpers\Traits\Logging\PsrLogTrait;

/**
 * Class PsrLogCompatibilityTest
 *
 * @group compatibility
 * @group logging
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PsrLogCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyPsrLogContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return PsrLogAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return PsrLogTrait::class;
    }
}

class DummyPsrLogContainer implements PsrLogAware{
    use PsrLogTrait;
}