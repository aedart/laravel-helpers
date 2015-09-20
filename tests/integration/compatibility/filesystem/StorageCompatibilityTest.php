<?php
use Aedart\Laravel\Helpers\Contracts\Filesystem\StorageAware;
use Aedart\Laravel\Helpers\Traits\Filesystem\StorageTrait;

/**
 * Class StorageCompatibilityTest
 *
 * @group compatibility
 * @group filesystem
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class StorageCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyStorageContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return StorageAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return StorageTrait::class;
    }
}

class DummyStorageContainer implements StorageAware{
    use StorageTrait;
}