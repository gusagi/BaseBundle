<?php

namespace Wizin\Bundle\BaseBundle\TestCase;

/**
 * Class ServiceTestCase
 *
 * @package Wizin\Bundle\BaseBundle\TestCase
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */
abstract class ServiceTestCase extends UnitTestCase
{
    /**
     * @return Service Object
     */
    abstract protected function getService();
}


