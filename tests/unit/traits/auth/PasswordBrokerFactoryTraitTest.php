<?php
use Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerFactoryTrait;
use Illuminate\Contracts\Auth\PasswordBrokerFactory;

/**
 * Class PasswordBrokerFactoryTraitTest
 *
 * @group traits
 * @group auth
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Auth\PasswordBrokerFactoryTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PasswordBrokerFactoryTraitTest extends TraitTestCase {

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|PasswordBrokerFactoryTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(PasswordBrokerFactoryTrait::class);
    }

    /**
     * @test
     * @covers ::hasPasswordBrokerFactory
     * @covers ::hasDefaultPasswordBrokerFactory
     */
    public function hasNoDefaultPasswordBrokerFactoryOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasPasswordBrokerFactory(), 'Should no have password factory manager set');
        $this->assertFalse($mock->hasDefaultPasswordBrokerFactory(), 'Should no have a default password factory manager set');
    }

    /**
     * @test
     * @covers ::getPasswordBrokerFactory
     * @covers ::hasPasswordBrokerFactory
     * @covers ::hasDefaultPasswordBrokerFactory
     * @covers ::setPasswordBrokerFactory
     * @covers ::getDefaultPasswordBrokerFactory
     */
    public function canObtainPasswordBrokerFactory()
    {
        // Before we obtain it - we need to make a small configuration
        // because the test-fixtures in Orchestra doesn't contain it.
        // We are generating it here, more or less just like Laravel
        //Config::set('app.key', Str::random(32));

        $mock = $this->getTraitMock();

        $broker = $mock->getPasswordBrokerFactory();

        $this->assertTrue($mock->hasPasswordBrokerFactory(), 'A password broker factory should have been set');
        $this->assertInstanceOf(PasswordBrokerFactory::class, $broker);
    }

}