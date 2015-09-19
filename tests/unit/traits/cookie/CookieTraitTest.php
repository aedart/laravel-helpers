<?php

use Aedart\Laravel\Helpers\Traits\Cookie\CookieTrait;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use \Mockery as m;

/**
 * Class CookieTraitTest
 *
 * @group traits
 * @group cookie
 * @coversDefaultClass Aedart\Laravel\Helpers\Traits\Cookie\CookieTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class CookieTraitTest extends TraitTestCase{

    protected function _before() {
        parent::_before();
    }


    /**
     * Get a mock for the given trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|CookieTrait
     */
    public function getTraitMock() {
        return $this->getMockForTrait(CookieTrait::class);
    }

    /**
     * @test
     * @covers ::hasCookie
     * @covers ::hasDefaultCookie
     */
    public function hasNoDefaultCookieJarOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasCookie(), 'Should no have a cookie jar set');
        $this->assertFalse($mock->hasDefaultCookie(), 'Should no have a default cookie jar set');
    }

    /**
     * @test
     * @covers ::getCookie
     * @covers ::hasCookie
     * @covers ::hasDefaultCookie
     * @covers ::setCookie
     * @covers ::getDefaultCookie
     */
    public function canObtainCookieJar()
    {
        $mock = $this->getTraitMock();

        $config = $mock->getCookie();

        $this->assertTrue($mock->hasCookie(), 'A cookie jar should have been set');
        $this->assertInstanceOf(CookieJar::class, $config);
    }

    /**
     * @test
     * @covers ::hasRequest
     */
    public function hasNotRequestInstanceOutsideLaravel() {
        $this->stopLaravel();

        $mock = $this->getTraitMock();

        $this->assertFalse($mock->hasRequest(), 'There should not be any instances of a request available');
    }

    /**
     * @test
     * @covers ::hasRequest
     * @covers ::getRequest
     */
    public function canObtainRequestInstance(){
        $mock = $this->getTraitMock();

        $this->assertInstanceOf(Request::class, $mock->getRequest(), 'Request instance was expected');
    }

    /**
     * NOTE: test is perform outside Laravel
     *
     * @test
     * @covers ::hasCookieKey
     */
    public function canDetermineIfCookieContainsKey(){
        $this->stopLaravel();

        $key = $this->faker->word;

        RequestFacade::shouldReceive('cookie')
            ->with($key, null)
            ->andReturn(true);

        $mock = $this->getTraitMock();

        $this->assertTrue($mock->hasCookieKey($key), 'Should contain key');
    }

    /**
     * NOTE: test is perform outside Laravel
     *
     * @test
     * @covers ::getCookieValue
     */
    public function canObtainCookieValue() {
        $this->stopLaravel();

        $key = $this->faker->word;

        $value = $this->faker->sentence;

        RequestFacade::shouldReceive('cookie')
            ->with($key, null)
            ->andReturn($value);

        $mock = $this->getTraitMock();

        $this->assertSame($value, $mock->getCookieValue($key), 'Incorrect value returned');
    }
}