<?php
use Aedart\Laravel\Helpers\Contracts\Database\SchemaAware;
use Aedart\Laravel\Helpers\Traits\Database\SchemaTrait;

/**
 * Class SchemaCompatibilityTest
 *
 * @group compatibility
 * @group database
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class SchemaCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummySchemaContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return SchemaAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return SchemaTrait::class;
    }
}

class DummySchemaContainer implements SchemaAware{
    use SchemaTrait;
}