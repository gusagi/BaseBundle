<?php
/**
 * Trait for TestCase
 */
namespace Wizin\Bundle\BaseBundle\Traits\TestCase;

use Symfony\Bridge\Doctrine\DataFixtures\ContainerAwareLoader;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;

/**
 * Trait for tests.
 *
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */
trait TestCase
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

    /**
     * @param FixtureInterface[] $fixtures
     * @param bool $append
     */
    protected function loadFixtures(array $fixtures, $append = false)
    {
        // suspend FOREIGN KEY constraint
        $entityManager = $this->getEntityManager();
        $entityManager->getConnection()->exec('SET foreign_key_checks = 0;');

        // load data fixtures
        $loader = new ContainerAwareLoader($this->getContainer());
        foreach ($fixtures as $fixture) {
            $loader->addFixture($fixture);
        }
        $purger = new ORMPurger($entityManager);
        $purger->setPurgeMode(ORMPurger::PURGE_MODE_TRUNCATE);
        $executor = new ORMExecutor($entityManager, $purger);
        $this->truncate($executor);
        $executor->execute($loader->getFixtures(), $append);

        // resume FOREIGN KEY constraint
        $entityManager->getConnection()->exec('SET foreign_key_checks = 1;');

        // clear entities that are currently managed
        $entityManager->clear();
    }

    /**
     * @param null|\Doctrine\Common\DataFixtures\Executor\ORMExecutor
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Exception
     */
    protected function truncate($executor = null)
    {
        // suspend FOREIGN KEY constraint
        $entityManager = $this->getEntityManager();
        $entityManager->getConnection()->exec('SET foreign_key_checks = 0;');

        // execute query with truncate table
        if (is_null($executor)) {
            $purger = new ORMPurger($entityManager);
            $purger->setPurgeMode(ORMPurger::PURGE_MODE_TRUNCATE);
            $executor = new ORMExecutor($entityManager, $purger);
        }
        $executor->purge();

        // resume FOREIGN KEY constraint
        $entityManager->getConnection()->exec('SET foreign_key_checks = 1;');

        // clear entities that are currently managed
        $entityManager->clear();
    }
}