<?php

namespace Wizin\Bundle\BaseBundle\Tests\TestCases;

use Wizin\Bundle\BaseBundle\TestCases\UnitTestCase;

class UnitTestCaseTest extends UnitTestCase
{
    /**
     * @test
     */
    public function isKernelBooted()
    {
        $this->assertInstanceOf('\Symfony\Component\HttpKernel\KernelInterface', static::$kernel);
    }

    /**
     * @test
     */
    public function isContainerLoaded()
    {
        $this->assertInstanceOf('\Symfony\Component\DependencyInjection\ContainerInterface', static::$container);
    }
}
