<?php

namespace Wizin\Bundle\BaseBundle\Tests\TestCase;

use Wizin\Bundle\BaseBundle\TestCase\UnitTestCase;

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
        $this->assertInstanceOf('\Symfony\Component\DependencyInjection\ContainerInterface', $this->getContainer());
    }
}
