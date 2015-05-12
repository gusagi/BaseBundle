<?php

namespace Wizin\Bundle\BaseBundle\Tests\TestCase;

use Wizin\Bundle\BaseBundle\TestCase\FunctionalTestCase;

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
