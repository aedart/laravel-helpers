<?php
use Aedart\Laravel\Helpers\Contracts\Queue\QueueFactoryAware;
use Aedart\Laravel\Helpers\Traits\Queue\QueueFactoryTrait;

/**
 * Class QueueFactoryCompatibilityTest
 *
 * @group compatibility
 * @group queue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class QueueFactoryCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyQueueFactoryContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return QueueFactoryAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return QueueFactoryTrait::class;
    }
}

class DummyQueueFactoryContainer implements QueueFactoryAware{
    use QueueFactoryTrait;
}