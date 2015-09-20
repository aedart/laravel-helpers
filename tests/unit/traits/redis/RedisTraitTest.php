<?php

use Aedart\Laravel\Helpers\Traits\Redis\RedisTrait;
use Illuminate\Contracts\Redis\Database;

/**
 * Class RedisTraitTest
 *
 * @group traits
 * @group redis
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Redis\RedisTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class RedisTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|RedisTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(RedisTrait::class);
    }

    /**
     * @test
     * @covers ::hasRedis
     * @covers ::hasDefaultRedis
     */
    public function hasNoDefaultRedisDatabaseOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasRedis(), 'Should no have redis database set');
        $this->assertFalse($mock->hasDefaultRedis(), 'Should no have a default redis database set');
    }

    /**
     * @test
     * @covers ::getRedis
     * @covers ::hasRedis
     * @covers ::hasDefaultRedis
     * @covers ::setRedis
     * @covers ::getDefaultRedis
     */
    public function canObtainRedisDatabase()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getRedis();

        $this->assertTrue($mock->hasRedis(), 'A redis database should have been set');
        $this->assertInstanceOf(Database::class, $config);
    }
}