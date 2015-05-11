<?php

namespace Wizin\Bundle\BaseBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * The base class for functional tests.
 *
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */
abstract class FunctionalTestCase extends WebTestCase
{
    /**
     * \Wizin\Bundle\BaseBundle\Tests\TestCaseTrait
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
