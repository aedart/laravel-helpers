<?php

use Aedart\Laravel\Helpers\Contracts\Database\DBManagerAware;
use Aedart\Laravel\Helpers\Traits\Database\DBManagerTrait;

/**
 * Class DBManagerCompatibilityTest
 *
 * @group compatibility
 * @group database
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class DBManagerCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyDBManagerContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return DBManagerAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return DBManagerTrait::class;
    }
}

class DummyDBManagerContainer implements DBManagerAware {
    use DBManagerTrait;
}