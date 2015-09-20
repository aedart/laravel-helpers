<?php
use Aedart\Laravel\Helpers\Contracts\Mail\MailAware;
use Aedart\Laravel\Helpers\Traits\Mail\MailTrait;

/**
 * Class MailCompatibilityTest
 *
 * @group compatibility
 * @group mail
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class MailCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyMailContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return MailAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return MailTrait::class;
    }
}

class DummyMailContainer implements MailAware{
    use MailTrait;
}