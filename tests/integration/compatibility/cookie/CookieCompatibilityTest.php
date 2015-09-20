<?php

use Aedart\Laravel\Helpers\Contracts\Cookie\CookieAware;
use Aedart\Laravel\Helpers\Traits\Cookie\CookieTrait;

/**
 * Class CookieCompatibilityTest
 *
 * @group compatibility
 * @group cookie
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class CookieCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyCookieContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return CookieAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return CookieTrait::class;
    }
}

class DummyCookieContainer implements CookieAware {
    use CookieTrait;
}