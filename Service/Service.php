<?php
/**
 * Base service class for Wizin package
 */
namespace Wizin\Bundle\BaseBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAware;

class Service extends ContainerAware
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->container->get('doctrine')->getManager();
    }
}

