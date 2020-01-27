<?php
/**
 *
 * User: belcebur
 * Date: 03/05/2018
 * Time: 12:15
 */

namespace LamBelcebur\DoctrineORMFastApi\Resource;


use Doctrine\ORM\EntityManager;
use Laminas\Hydrator\HydratorInterface;

interface DoctrineORMFastApiInterface
{
    public function toDoctrineORMFastApi(EntityManager $em, HydratorInterface $hydrator): array;
}
