<?php

namespace Wizin\Bundle\BaseBundle\Tests\Service;

use Wizin\Bundle\BaseBundle\TestCase\ServiceTestCase;

class DateTimeServiceTest extends ServiceTestCase
{
    /**
     * @test
     */
    public function getDateTimeServiceInstance()
    {
        $this->assertInstanceOf('\Wizin\Bundle\BaseBundle\Service\DateTimeService', $this->getService());
    }

    /**
     * @return \Wizin\Bundle\BaseBundle\Service\DateTimeService
     */
    protected function getService()
    {
        return static::$container->get('wizin.base.date_time');
    }
}
