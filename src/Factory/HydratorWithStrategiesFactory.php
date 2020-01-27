<?php


namespace LamBelcebur\DoctrineORMFastApi\Factory;


use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use LamBelcebur\DoctrineORMFastApi\Resource\ConfigReflection;
use LamBelcebur\DoctrineORMFastApi\Resource\HydratorWithStrategies;
use Laminas\ServiceManager\Exception\ServiceNotCreatedException;
use Laminas\ServiceManager\Exception\ServiceNotFoundException;
use Laminas\ServiceManager\Factory\FactoryInterface;

class HydratorWithStrategiesFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     *
     * @return HydratorWithStrategies
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $configReflection = $container->get(ConfigReflection::class);
        $strategies = [];

        foreach ($configReflection->getStrategies() as $strategyClass) {
            if ($container->has($strategyClass)) {
                $strategies[$strategyClass] = $container->get($strategyClass);
            }
        }

        return new HydratorWithStrategies(
            $configReflection->getConfig(),
            $strategies,
            $container->get(EntityManager::class),
            true
        );
    }

}
