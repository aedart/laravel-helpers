<?php

use Aedart\Laravel\Helpers\Contracts\Console\ArtisanAware;
use Aedart\Laravel\Helpers\Traits\Console\ArtisanTrait;

/**
 * Class ArtisanCompatibilityTest
 *
 * @group compatibility
 * @group console
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ArtisanCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyArtisanContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return ArtisanAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return ArtisanTrait::class;
    }
}

class DummyArtisanContainer implements ArtisanAware {
    use ArtisanTrait;
}