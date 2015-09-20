<?php
use Aedart\Laravel\Helpers\Contracts\Mail\MailMailerAware;
use Aedart\Laravel\Helpers\Traits\Mail\MailMailerTrait;

/**
 * Class MailMailerCompatibilityTest
 *
 * @group compatibility
 * @group mail
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class MailMailerCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyMailMailerContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return MailMailerAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return MailMailerTrait::class;
    }
}

class DummyMailMailerContainer implements MailMailerAware{
    use MailMailerTrait;
}