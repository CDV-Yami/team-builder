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

class CampingSkillController extends Controller
{

    /**
     * @Route("/archetypes/{archetype}/campingskills/create", name="archetype_campingskill_create")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function createAction(Archetype $archetype, Request $request)
    {
        $campingSkill = new CampingSkill();
        $campingSkill->setArchetype($archetype);

        $form = $this->createForm(new CampingSkillType(), $campingSkill);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($campingSkill);
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addCampingSkill.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/campingskills/update/{campingSkill}", name="archetype_campingskill_update")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("campingSkill", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\CampingSkill", options={"repository_method"="find"})
     */
    public function updateAction(Archetype $archetype, CampingSkill $campingSkill, Request $request)
    {
        $form = $this->createForm(new CampingSkillType(), $campingSkill);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addCampingSkill.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/campingskills/delete/{campingSkill}", name="archetype_campingskill_delete")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("campingSkill", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\CampingSkill", options={"repository_method"="find"})
     */
    public function deleteAction(Archetype $archetype, CampingSkill $campingSkill)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($campingSkill);
        $manager->flush();

        return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);

    }
}
