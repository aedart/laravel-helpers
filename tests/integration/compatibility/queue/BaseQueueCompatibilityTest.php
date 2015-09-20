<?php
use Aedart\Laravel\Helpers\Contracts\Queue\BaseQueueAware;
use Aedart\Laravel\Helpers\Traits\Queue\BaseQueueTrait;

/**
 * Class BaseQueueCompatibilityTest
 *
 * @group compatibility
 * @group queue
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class BaseQueueCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyBaseQueueContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return BaseQueueAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return BaseQueueTrait::class;
    }
}

class DummyBaseQueueContainer implements BaseQueueAware{
    use BaseQueueTrait;
}