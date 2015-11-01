<?php

namespace Yami\TeamBuilder\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

class ArchetypeRepository extends EntityRepository
{
    public function findOneByName($name)
    {
        return $this->createQueryBuilder('arc')
            ->select('arc', 'att', 'ab', 'camp')
            ->where('arc.name = :name')
            ->leftJoin('arc.attributes', 'attr')
            ->leftJoin('arc.abilities', 'ab')
            ->leftJoin('arc.campingSkills', 'camp')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }


}