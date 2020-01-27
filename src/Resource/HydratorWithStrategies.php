<?php


namespace LamBelcebur\DoctrineORMFastApi\Resource;


use Doctrine\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineObjectHydrator;
use LamBelcebur\DoctrineORMFastApi\Strategy\DashNamingStrategy;
use LamBelcebur\DoctrineORMFastApi\Strategy\EntityStrategy;
use Laminas\Hydrator\NamingStrategy\NamingStrategyInterface;

class HydratorWithStrategies extends DoctrineObjectHydrator
{

    /** @var array */
    protected $strategies = [];

    /**
     * HydratorWithStrategies constructor.
     *
     * @param array $config
     * @param array $strategies
     * @param ObjectManager $objectManager
     * @param bool $byValue
     */
    public function __construct(array $config, array $strategies, ObjectManager $objectManager, $byValue = true)
    {
        parent::__construct($objectManager, $byValue);
        $namingStrategy = $config['naming_strategy'] instanceOf NamingStrategyInterface ? $config['naming_strategy'] : new DashNamingStrategy();
        $this->strategies = $strategies;
        $this->setNamingStrategy($namingStrategy);
        $this->addStrategy(null, $strategies[EntityStrategy::class]);
    }

    /**
     * @return array
     */
    public function getStrategies(): array
    {
        return $this->strategies;
    }


}
