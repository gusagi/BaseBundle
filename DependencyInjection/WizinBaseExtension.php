<?php

namespace Wizin\Bundle\BaseBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class WizinBaseExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('parameters.yml');
        $loader->load('services.yml');
    }

    /**
     * Allow an extension to prepend the extension configurations.
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        // get all bundles
        $bundles = $container->getParameter('kernel.bundles');
        // determine if StofDoctrineExtensionsBundle is registered
        if (isset($bundles['StofDoctrineExtensionsBundle'])) {
            foreach ($container->getExtensions() as $name => $extension) {
                switch ($name) {
                    case 'stof_doctrine_extensions':
                        $configs = $container->getExtensionConfig('stof_doctrine_extensions');
                        if (isset($configs[0])) {
                            if (isset($configs[0]['orm'])) {
                                if ($configs[0]['orm']['default']) {
                                    $configs[0]['orm']['default']['timestampable'] = true;
                                } else {
                                    $configs[0]['orm']['default'] = ['timestampable' => true];
                                }
                            } else {
                                $configs[0]['orm'] = ['default' => ['timestampable' => true]];
                            }
                        } else {
                            $configs = ['orm' => ['default' => ['timestampable' => true]]];
                        }
                        if (isset($configs[0]['orm'])) {
                            $container->prependExtensionConfig($name, $configs[0]);
                        }
                        break;
                }
            }
        }
    }
}
