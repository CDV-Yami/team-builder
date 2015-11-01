<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Yami\TeamBuilder\AppBundle\Entity;

class TeamBuilderData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $crusader = new Entity\Archetype();
        $crusader->setName('Crusader');
        $crusader->setStun(40);
        $crusader->setBlight(40);
        $crusader->setDisease(30);
        $crusader->setDeathBlow(67);
        $crusader->setMove(40);
        $crusader->setBleed(40);
        $crusader->setDebuff(30);
        $crusader->setTrap(20);
        $manager->persist($crusader);

        $hellion = new Entity\Archetype();
        $hellion->setName('Hellion');
        $hellion->setStun(40);
        $hellion->setBlight(40);
        $hellion->setDisease(30);
        $hellion->setDeathBlow(67);
        $hellion->setMove(40);
        $hellion->setBleed(40);
        $hellion->setDebuff(30);
        $hellion->setTrap(20);
        $manager->persist($hellion);

        $smite = new Entity\Ability();
        $smite->setArchetype($crusader);
        $smite->setName('Smite');
        $smite->setCastPositions([1,2]);
        $smite->setTargetPositions([1,2]);
        $smite->setDescription('ACC base : 80. Self: +15% DMG vs Unholy');
        $manager->persist($smite);

        $ifItBleeds = new Entity\Ability();
        $ifItBleeds->setArchetype($hellion);
        $ifItBleeds->setName('If It Bleeds');
        $ifItBleeds->setCastPositions([1,2,3]);
        $ifItBleeds->setTargetPositions([2,3]);
        $ifItBleeds->setDescription('ACC base : 85. Target: Bleed(100% base) 1pts/round for 3 rounds');
        $manager->persist($ifItBleeds);

        $encourage = new Entity\CampingSkill();
        $encourage->setDescription('Reduce stress by 10');
        $encourage->setName('Encourage');
        $encourage->setTarget('One Companion');
        $encourage->setTimeCost(2);
        $manager->persist($encourage);

        $unshakeable = new Entity\CampingSkill();
        $unshakeable->setArchetype($crusader);
        $unshakeable->setDescription('+20% Stress Resist');
        $unshakeable->setName('Unshakeable Leader');
        $unshakeable->setTarget('All Companion');
        $unshakeable->setTimeCost(4);
        $manager->persist($unshakeable);

        $lvl1Crusader = new Entity\Attributes(
            $crusader,
            1,
            33,
            5,
            1,
            5,
            [6,12]
        );
        $manager->persist($lvl1Crusader);

        $lvl1Hellion = new Entity\Attributes(
            $hellion,
            1,
            26,
            10,
            4,
            2,
            [6,12]
        );
        $manager->persist($lvl1Hellion);

        $manager->flush();
    }
}