<?php

namespace Wizin\Bundle\BaseBundle\Tests\TestCases;

use Wizin\Bundle\BaseBundle\TestCases\FunctionalTestCase;

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
