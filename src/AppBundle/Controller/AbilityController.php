<?php

namespace Yami\TeamBuilder\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yami\TeamBuilder\AppBundle\Entity\Ability;
use Yami\TeamBuilder\AppBundle\Entity\Archetype;
use Yami\TeamBuilder\AppBundle\Entity\CampingSkill;
use Yami\TeamBuilder\AppBundle\Form\Type\AbilityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Yami\TeamBuilder\AppBundle\Form\Type\ArchetypeType;
use Yami\TeamBuilder\AppBundle\Form\Type\CampingSkillType;

class AbilityController extends Controller
{

    /**
     * @Route("/archetypes/{archetype}/abilities/create", name="archetype_ability_create")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function createAction(Archetype $archetype, Request $request)
    {
        $ability = new Ability();
        $ability->setArchetype($archetype);

        $form = $this->createForm(new AbilityType(), $ability);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($ability);
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addAbility.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/abilities/update/{ability}", name="archetype_ability_update")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("ability", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Ability", options={"repository_method"="find"})
     */
    public function updateAction(Archetype $archetype, Ability $ability, Request $request)
    {
        $form = $this->createForm(new AbilityType(), $ability);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addAbility.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/abilities/delete/{ability}", name="archetype_ability_delete")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("ability", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Ability", options={"repository_method"="find"})
     */
    public function deleteAction(Archetype $archetype, Ability $ability)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($ability);
        $manager->flush();

        return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);

    }

}
