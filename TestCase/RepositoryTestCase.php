<?php

namespace Wizin\Bundle\BaseBundle\TestCase;

/**
 * Class RepositoryTestCase
 *
 * @package Wizin\Bundle\BaseBundle\TestCase
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */
abstract class RepositoryTestCase extends UnitTestCase
{
    /**
     * @return Repository Object
     */
    abstract protected function getRepository();
}


