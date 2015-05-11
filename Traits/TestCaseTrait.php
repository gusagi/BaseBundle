<?php
/**
 * Trait for TestCase
 */
namespace Wizin\Bundle\BaseBundle\Traits;

/**
 * Trait for tests.
 *
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */
trait TestCaseTrait
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected static $container;

    /**
     * set ContainerInterface instance to property
     *
     * @return void
     */
    protected function setUpContainer()
    {
        static::$container = static::$kernel->getContainer();
    }

}