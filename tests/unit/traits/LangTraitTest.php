<?php

use Aedart\Laravel\Helpers\Traits\LangTrait;
use Illuminate\Translation\Translator;

/**
 * Class LangTraitTest
 *
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\LangTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class LangTraitTest extends TraitTestCase{

    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|LangTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(LangTrait::class);
    }

    /**
     * @test
     * @covers ::hasLang
     * @covers ::hasDefaultLang
     */
    public function hasNoDefaultLaravelTranslatorOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasLang(), 'Should no have laravel translator set');
        $this->assertFalse($mock->hasDefaultLang(), 'Should no have a default laravel translator set');
    }

    /**
     * @test
     * @covers ::getLang
     * @covers ::hasLang
     * @covers ::hasDefaultLang
     * @covers ::setLang
     * @covers ::getDefaultLang
     */
    public function canObtainLaravelTranslator()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getLang();

        $this->assertTrue($mock->hasLang(), 'A laravel translator should have been set');
        $this->assertInstanceOf(Translator::class, $config);
    }
}