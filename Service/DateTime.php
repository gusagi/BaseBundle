<?php
/**
 * DateTime Service
 */
namespace Wizin\Bundle\BaseBundle\Service;

/**
 * Class DateTime
 *
 * @package Wizin\Bundle\BaseBundle\Service
 * @author Makoto Hashiguchi <gusagi@gmail.com>
 */
class DateTime
{
    /**
     * @var float request timestamp
     */
    protected $requestTimestamp;

    /**
     * constructor
     */
    public function __construct()
    {
        if (isset($_SERVER['REQUEST_TIME_FLOAT']) === true) {
            $this->requestTimestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        } else {
            $this->requestTimestamp = microtime(true);
        }
    }

    /**
     * @return float|mixed request timestamp
     */
    public function getRequestTimestamp()
    {
        return $this->requestTimestamp;
    }

    /**
     * @return \DateTime request datetime
     */
    public function request()
    {
        return new \DateTime(date('Y-m-d H:i:s', $this->requestTimestamp));
    }

    /**
     * @return \DateTime current datetime
     */
    public function current()
    {
        return new \DateTime();
    }
}

