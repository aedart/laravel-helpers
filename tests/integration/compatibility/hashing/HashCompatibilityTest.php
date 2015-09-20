<?php
use Aedart\Laravel\Helpers\Contracts\Hashing\HashAware;
use Aedart\Laravel\Helpers\Traits\Hashing\HashTrait;

/**
 * Class HashCompatibilityTest
 *
 * @group compatibility
 * @group hashing
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class HashCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyHashContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return HashAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return HashTrait::class;
    }
}

class DummyHashContainer implements HashAware {
    use HashTrait;
}