<?php
use Aedart\Laravel\Helpers\Contracts\Translation\LangAware;
use Aedart\Laravel\Helpers\Traits\Translation\LangTrait;

/**
 * Class LangCompatibilityTest
 *
 * @group compatibility
 * @group translation
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class LangCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyLangContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return LangAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return LangTrait::class;
    }
}

class DummyLangContainer implements LangAware{
    use LangTrait;
}