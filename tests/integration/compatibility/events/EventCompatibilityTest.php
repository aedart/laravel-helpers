<?php
use Aedart\Laravel\Helpers\Contracts\Events\EventAware;
use Aedart\Laravel\Helpers\Traits\Events\EventTrait;

/**
 * Class EventCompatibilityTest
 *
 * @group compatibility
 * @group events
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class EventCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyEventContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return EventAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return EventTrait::class;
    }
}

class DummyEventContainer implements EventAware{
    use EventTrait;
}