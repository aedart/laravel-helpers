<?php

use Aedart\Laravel\Helpers\Contracts\Database\DBAware;
use Aedart\Laravel\Helpers\Traits\Database\DBTrait;

/**
 * Class DBCompatibilityTest
 *
 * @group compatibility
 * @group database
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class DBCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyDBContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return DBAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return DBTrait::class;
    }
}

class DummyDBContainer implements DBAware {
    use DBTrait;
}