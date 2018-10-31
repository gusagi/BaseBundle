<?php
/**
 * Base service class for Wizin package
 */
namespace Wizin\Bundle\BaseBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Service
{
    /**
     * \Symfony\Component\DependencyInjection\ContainerAwareTrait
     */
    use ContainerAwareTrait;

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->container->get('doctrine')->getManager();
    }
}

