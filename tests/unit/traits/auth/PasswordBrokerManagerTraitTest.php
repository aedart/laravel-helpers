<?php
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerManagerTrait;
use Illuminate\Auth\Passwords\PasswordBrokerManager;

/**
 * Class PasswordBrokerManagerTraitTest
 *
 * @group traits
 * @group auth
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerManagerTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package unit\traits\auth
 */
class PasswordBrokerManagerTraitTest extends TraitTestCase {

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|PasswordBrokerManagerTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(PasswordBrokerManagerTrait::class);
    }

    /**
     * @test
     * @covers ::hasPasswordBrokerManager
     * @covers ::hasDefaultPasswordBrokerManager
     */
    public function hasNoDefaultPasswordBrokerManagerOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasPasswordBrokerManager(), 'Should no have password broker manager set');
        $this->assertFalse($mock->hasDefaultPasswordBrokerManager(), 'Should no have a default password broker manager set');
    }

    /**
     * @test
     * @covers ::getPasswordBrokerManager
     * @covers ::hasPasswordBrokerManager
     * @covers ::hasDefaultPasswordBrokerManager
     * @covers ::setPasswordBrokerManager
     * @covers ::getDefaultPasswordBrokerManager
     */
    public function canObtainPasswordBrokerManager()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        //Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $broker = $mock->getPasswordBrokerManager();

        $this->assertTrue($mock->hasPasswordBrokerManager(), 'A password broker manager should have been set');
        $this->assertInstanceOf(PasswordBrokerManager::class, $broker);
    }
}