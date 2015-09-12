<?php

use Aedart\Facade\Helpers\Traits\CryptTrait;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * Class CryptTraitTest
 *
 * @coversDefaultClass Aedart\Facade\Helpers\Traits\CryptTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class CryptTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|CryptTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(CryptTrait::class);
    }

    /**
     * @test
     * @covers ::hasCrypt
     * @covers ::hasDefaultCrypt
     */
    public function hasNoDefaultEncrypterOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasCrypt(), 'Should no have an encrypter set');
        $this->assertFalse($mock->hasDefaultCrypt(), 'Should no have a default encrypter set');
    }

    /**
     * @test
     * @covers ::getCrypt
     * @covers ::hasCrypt
     * @covers ::hasDefaultCrypt
     * @covers ::setCrypt
     * @covers ::getDefaultCrypt
     */
    public function canObtainEncrypter()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $config = $mock->getCrypt();

        $this->assertTrue($mock->hasCrypt(), 'An encrypter should have been set');
        $this->assertInstanceOf(Encrypter::class, $config);
    }
}