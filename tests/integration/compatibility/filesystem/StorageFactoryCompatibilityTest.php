<?php
use Aedart\Laravel\Helpers\Contracts\Filesystem\StorageFactoryAware;
use Aedart\Laravel\Helpers\Traits\Filesystem\StorageFactoryTrait;

/**
 * Class StorageFactoryCompatibilityTest
 *
 * @group compatibility
 * @group filesystem
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class StorageFactoryCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyStorageFactoryContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return StorageFactoryAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return StorageFactoryTrait::class;
    }
}

class DummyStorageFactoryContainer implements StorageFactoryAware{
    use StorageFactoryTrait;
}