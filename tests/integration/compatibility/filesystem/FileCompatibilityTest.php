<?php
use Aedart\Laravel\Helpers\Contracts\Filesystem\FileAware;
use Aedart\Laravel\Helpers\Traits\Filesystem\FileTrait;

/**
 * Class FileCompatibilityTest
 *
 * @group compatibility
 * @group filesystem
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class FileCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyFileContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return FileAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return FileTrait::class;
    }
}

class DummyFileContainer implements FileAware{
    use FileTrait;
}