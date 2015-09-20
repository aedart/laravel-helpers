<?php
use Aedart\Laravel\Helpers\Contracts\Queue\QueueAware;
use Aedart\Laravel\Helpers\Traits\Queue\QueueTrait;

/**
 * Class QueueCompatibilityTest
 *
 * @group compatibility
 * @group queue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class QueueCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyQueueContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return QueueAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return QueueTrait::class;
    }
}

class DummyQueueContainer implements QueueAware{
    use QueueTrait;
}