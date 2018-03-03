<?php

use Aedart\Testing\TestCases\Unit\UnitTestCase;

use Illuminate\Contracts\Auth\Access\Gate;
use \Mockery as m;

/**
 * AccessGateMockTest
 *
 * @group access-gate-mock
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class AccessGateMockTest extends UnitTestCase
{
    /**
     * @test
     */
    public function canMockAccessGate()
    {
        // TODO: See https://github.com/mockery/mockery/issues/861
        $this->markTestSkipped('Unable to create mock. See https://github.com/mockery/mockery/issues/861');

        $mock = m::mock(Gate::class);
    }
}