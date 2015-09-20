<?php
use Aedart\Laravel\Helpers\Contracts\Redis\RedisAware;
use Aedart\Laravel\Helpers\Traits\Redis\RedisTrait;

/**
 * Class RedisCompatibilityTest
 *
 * @group compatibility
 * @group redis
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class RedisCompatibilityTest extends CompatibilityTestCase{

    /**
     * Returns the class path to a class that implements the
     * given `interface` in question, and that uses its
     * corresponding `trait` implementation.
     *
     * @return string
     */
    public function dummyClassPath() {
        return DummyRedisContainer::class;
    }

    /**
     * Returns the class path of the `interface` in question
     *
     * @return string
     */
    public function mustImplementInterface() {
        return RedisAware::class;
    }

    /**
     * Returns the class path of the `trait` in question
     *
     * @return string
     */
    public function mustUseTrait() {
        return RedisTrait::class;
    }
}

class DummyRedisContainer implements RedisAware {
    use RedisTrait;
}