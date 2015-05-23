<?php
namespace Wizin\Bundle\BaseBundle\DataFixtures\ORM;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Nelmio\Alice\ProcessorInterface;

class IdGeneratorProcessor implements ProcessorInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var array
     */
    private $idGenerators = [];

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function preProcess($object)
    {
        // force entity ID on persist
        // @see https://github.com/doctrine/data-fixtures/issues/129
        $entityManager = $this->getEntityManager();
        $metadata = $entityManager->getMetadataFactory()->getMetadataFor(get_class($object));
        if (isset($this->idGenerators[get_class($object)]) === false) {
            $this->idGenerators[get_class($object)] = [
                'metadata' => $metadata,
                'idGenerator' => $metadata->getMetadataValue('idGenerator'),
            ];
        }
        $metadata->setIdGenerator(new AssignedGenerator());

    }

    /**
     * {@inheritdoc}
     */
    public function postProcess($object)
    {
        foreach ($this->idGenerators as $entityName => $params) {
            $metadata = $params['metadata'];
            $metadata->setIdGenerator($params['idGenerator']);
        }
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getEntityManager()
    {
        return $this->container->get('doctrine')->getManager();
    }
}
