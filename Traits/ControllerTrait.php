<?php
/**
 * Trait for Controller
 */
namespace Wizin\Bundle\BaseBundle\Traits;

/**
 * Trait for Controller
 *
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */
trait ControllerTrait
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->container->get('doctrine')->getManager();
    }

}

