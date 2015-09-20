<?php
use Aedart\Laravel\Helpers\Contracts\Queue\QueueMonitorAware;
use Aedart\Laravel\Helpers\Traits\Queue\QueueMonitorTrait;

/**
 * Class QueueMonitorCompatibilityTest
 *
 * @group compatibility
 * @group queue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class QueueMonitorCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyQueueMonitorContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return QueueMonitorAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return QueueMonitorTrait::class;
    }
}

class DummyQueueMonitorContainer implements QueueMonitorAware{
    use QueueMonitorTrait;
}