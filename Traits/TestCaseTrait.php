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
     * @return \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected function getContainer()
    {
        return static::$kernel->getContainer();
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getContainer()->get('doctrine')->getManager();
    }

}