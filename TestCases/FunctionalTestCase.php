<?php

namespace Wizin\Bundle\BaseBundle\TestCases;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Wizin\Bundle\BaseBundle\Traits\TestCaseTrait;

/**
 * The base class for functional tests.
 *
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */
abstract class FunctionalTestCase extends WebTestCase
{
    /**
     * \Wizin\Bundle\BaseBundle\Traits\TestCaseTrait
     */
    use TestCaseTrait;

    /**
     * @var \Symfony\Bundle\FrameworkBundle\Client
     */
    protected static $client;

    /**
     * @return null
     */
    public function setUp()
    {
        static::$client = $this->createClient();
        $this->setUpContainer();
    }
}
