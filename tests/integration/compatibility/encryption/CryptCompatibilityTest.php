<?php

use Aedart\Laravel\Helpers\Contracts\Encryption\CryptAware;
use Aedart\Laravel\Helpers\Traits\Encryption\CryptTrait;

/**
 * Class CryptCompatibilityTest
 *
 * @group compatibility
 * @group encryption
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class CryptCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyCryptContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return CryptAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return CryptTrait::class;
    }
}

class DummyCryptContainer implements CryptAware {
    use CryptTrait;
}