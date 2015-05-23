<?php

namespace Wizin\Bundle\BaseBundle\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Wizin\Bundle\BaseBundle\Traits\TestCaseTrait;

/**
 * The base class for functional tests.
 *
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */

/**
 * Class FunctionalTestCase
 * The base class for functional tests.
 *
 * @package Wizin\Bundle\BaseBundle\TestCase
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
    protected $client;

    /**
     * @return null
     */
    public function setUp()
    {
        parent::setUp();

        $this->client = $this->createClient();
    }

    /**
     * @return null
     */
    public function tearDown()
    {
        unset($this->client);

        parent::tearDown();
    }

    /**
     * @return \Symfony\Bundle\FrameworkBundle\Client
     */
    protected function getClient()
    {
        return $this->client;
    }
}
