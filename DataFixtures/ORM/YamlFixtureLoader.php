<?php
namespace Wizin\Bundle\BaseBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

abstract class YamlFixtureLoader extends DataFixtureLoader
{
    /**
     * Returns an array of ProcessorInterface to process fixtures
     *
     * @return ProcessorInterface[]
     */
    protected function getProcessors()
    {
        return [new IdGeneratorProcessor($this->container)];
    }
}
