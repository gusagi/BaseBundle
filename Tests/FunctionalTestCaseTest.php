<?php

namespace Wizin\Bundle\BaseBundle\Tests;

class FunctionalTestCaseTest extends FunctionalTestCase
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
    public function isClientLoaded()
    {
        $this->assertInstanceOf('\Symfony\Bundle\FrameworkBundle\Client', static::$client);
    }

    /**
     * @test
     */
    public function isContainerLoaded()
    {
        $this->assertInstanceOf('\Symfony\Component\DependencyInjection\ContainerInterface', static::$container);
    }
}
