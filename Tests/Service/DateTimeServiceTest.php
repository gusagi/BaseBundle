<?php

namespace Wizin\Bundle\BaseBundle\Tests\Service {
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
         * @test
         */
        public function getRequestTimestamp_x_RequestTimeFloat()
        {
            $microSecond = 1430406000.123456789012345678901;
            $requestTimeFloat = isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : null;
            $_SERVER['REQUEST_TIME_FLOAT'] = $microSecond;
            $this->assertSame($microSecond, $this->getService()->getRequestTimestamp());
            $_SERVER['REQUEST_TIME_FLOAT'] = $requestTimeFloat;
        }

        /**
         * @test
         */
        public function getRequestTimestamp_x_Microtime()
        {
            $microSecond = 1430406000.123456789012345678901;
            $requestTimeFloat = isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : null;
            unset($_SERVER['REQUEST_TIME_FLOAT']);
            $GLOBALS['MICROTIME_FOR_TEST'] = $microSecond;
            $this->assertSame($microSecond, $this->getService()->getRequestTimestamp());
            unset($GLOBALS['MICROTIME_FOR_TEST']);
            $_SERVER['REQUEST_TIME_FLOAT'] = $requestTimeFloat;
        }

        /**
         * @test
         */
        public function request_x_RequestTimeFloat()
        {
            $microSecond = 1431442800.690743923187255859375;
            $requestTimeFloat = isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : null;
            $_SERVER['REQUEST_TIME_FLOAT'] = $microSecond;
            $requestDateTime = $this->getService()->request();
            $this->assertSame($requestDateTime->format('Y-m-d H:i:s'), '2015-05-13 00:00:00');
            $_SERVER['REQUEST_TIME_FLOAT'] = $requestTimeFloat;
        }

        /**
         * @test
         */
        public function request_x_Microtime()
        {
            $microSecond = 1431442800.690743923187255859375;
            $requestTimeFloat = isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : null;
            unset($_SERVER['REQUEST_TIME_FLOAT']);
            $GLOBALS['MICROTIME_FOR_TEST'] = $microSecond;
            $requestDateTime = $this->getService()->request();
            $this->assertSame($requestDateTime->format('Y-m-d H:i:s'), '2015-05-13 00:00:00');
            unset($GLOBALS['MICROTIME_FOR_TEST']);
            $_SERVER['REQUEST_TIME_FLOAT'] = $requestTimeFloat;
        }

        /**
         * @return \Wizin\Bundle\BaseBundle\Service\DateTimeService
         */
        protected function getService()
        {
            return static::$container->get('wizin.base.date_time');
        }
    }
}

namespace Wizin\Bundle\BaseBundle\Service {
    function microtime($getAsFloat = false)
    {
        if (isset($GLOBALS['MICROTIME_FOR_TEST']) && is_float($GLOBALS['MICROTIME_FOR_TEST'])) {
            $microSecond = $GLOBALS['MICROTIME_FOR_TEST'];
        } else {
            $microSecond = \microtime($getAsFloat);
        }

        return $microSecond;
    }
}
