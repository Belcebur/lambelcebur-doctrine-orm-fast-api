<?php
/**
 *
 * User: belcebur
 * Date: 09/05/2018
 * Time: 13:48
 */

namespace LamBelcebur\DoctrineORMFastApi\Factory\Strategy;


use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use LamBelcebur\DoctrineORMFastApi\Strategy\CollectionStrategy;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use Laminas\ServiceManager\Factory\FactoryInterface;

class CollectionStrategyFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     *
     * @return CollectionStrategy
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CollectionStrategy(
            $container->get(EntityManager::class)
        );
    }
}
