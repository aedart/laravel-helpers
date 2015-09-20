<?php
use Aedart\Laravel\Helpers\Contracts\Translation\LangTranslatorAware;
use Aedart\Laravel\Helpers\Traits\Translation\LangTranslatorTrait;

/**
 * Class LangTranslatorCompatibilityTest
 *
 * @group compatibility
 * @group translation
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class LangTranslatorCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyLangTranslatorContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return LangTranslatorAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return LangTranslatorTrait::class;
    }
}

class DummyLangTranslatorContainer implements LangTranslatorAware{
    use LangTranslatorTrait;
}