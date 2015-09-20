<?php
use Aedart\Laravel\Helpers\Contracts\Mail\MailQueueAware;
use Aedart\Laravel\Helpers\Traits\Mail\MailQueueTrait;

/**
 * Class MailQueueCompatibilityTest
 *
 * @group compatibility
 * @group mail
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class MailQueueCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyMailQueueContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return MailQueueAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return MailQueueTrait::class;
    }
}

class DummyMailQueueContainer implements MailQueueAware{
    use MailQueueTrait;
}