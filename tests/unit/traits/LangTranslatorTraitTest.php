<?php

use Aedart\Laravel\Helpers\Traits\LangTranslatorTrait;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class LangTranslatorTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\LangTranslatorTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class LangTranslatorTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|LangTranslatorTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(LangTranslatorTrait::class);
    }

    /**
     * @test
     * @covers ::hasLangTranslator
     * @covers ::hasDefaultLangTranslator
     */
    public function hasNoDefaultSymfonyTranslatorOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasLangTranslator(), 'Should no have symfony translator set');
        $this->assertFalse($mock->hasDefaultLangTranslator(), 'Should no have a default symfony translator set');
    }

    /**
     * @test
     * @covers ::getLangTranslator
     * @covers ::hasLangTranslator
     * @covers ::hasDefaultLangTranslator
     * @covers ::setLangTranslator
     * @covers ::getDefaultLangTranslator
     */
    public function canObtainSymfonyTranslator()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getLangTranslator();

        $this->assertTrue($mock->hasLangTranslator(), 'A symfony translator should have been set');
        $this->assertInstanceOf(TranslatorInterface::class, $config);
    }

}