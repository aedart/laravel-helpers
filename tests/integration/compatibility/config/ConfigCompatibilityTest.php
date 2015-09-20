<?php

use Aedart\Laravel\Helpers\Contracts\Config\ConfigAware;
use Aedart\Laravel\Helpers\Traits\Config\ConfigTrait;

/**
 * Class ConfigCompatibilityTest
 *
 * @group compatibility
 * @group config
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ConfigCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyConfigContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return ConfigAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return ConfigTrait::class;
    }
}

class DummyConfigContainer implements ConfigAware {
    use ConfigTrait;
}