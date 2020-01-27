<?php

namespace LamBelcebur\DoctrineORMFastApi\Factory\Controller;

use Interop\Container\ContainerInterface;
use LamBelcebur\DoctrineORMFastApi\Controller\IndexController;
use LamBelcebur\DoctrineORMFastApi\Resource\ConfigReflection;
use LamBelcebur\DoctrineORMFastApi\Resource\HydratorWithStrategies;
use Laminas\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     *
     * @return IndexController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $configReflection = $container->get(ConfigReflection::class);
        return new IndexController(
            $configReflection,
            $container->get(HydratorWithStrategies::class),
            $container->has('FormElementManager') ? $container->get('FormElementManager') : null
        );
    }
}
