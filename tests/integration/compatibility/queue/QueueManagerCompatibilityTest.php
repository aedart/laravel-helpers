<?php
use Aedart\Laravel\Helpers\Contracts\Queue\QueueManagerAware;
use Aedart\Laravel\Helpers\Traits\Queue\QueueManagerTrait;

/**
 * Class QueueManagerCompatibilityTest
 *
 * @group compatibility
 * @group queue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class QueueManagerCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyQueueManagerContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return QueueManagerAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return QueueManagerTrait::class;
    }
}

class DummyQueueManagerContainer implements QueueManagerAware{
    use QueueManagerTrait;
}