<?php

namespace Wizin\Bundle\BaseBundle\Tests;

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
