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

class ArchetypeController extends Controller
{
    /**
     * @Route("/archetypes", name="archetype_index")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $archetypes = $this->getDoctrine()
            ->getManager()
            ->getRepository('Yami\TeamBuilder\AppBundle\Entity\Archetype')
            ->findAll()
        ;

        return $this->render('AppBundle:archetype:index.html.twig', ['archetypes' => $archetypes]);
    }

    /**
     * @Route("/archetypes/{archetype}", name="archetype_show")
     * @Method({"GET"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function showAction(Archetype $archetype)
    {
        return $this->render('AppBundle:archetype:show.html.twig', ['archetype' => $archetype]);
    }

    /**
     * @Route("/archetypes/newArchetype/add", name="archetype_add")
     * @Method({"GET", "POST"})
     */
    public function addArchetypeAction(Request $request)
    {
        $archetype = new Archetype();

        $form = $this->createForm(new ArchetypeType(), $archetype);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($archetype);
            $manager->flush();

            return $this->redirectToRoute('archetype_index');
        }

        return $this->render('AppBundle:archetype:addArchetype.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/update", name="archetype_update")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function updateArchetypeAction(Archetype $archetype, Request $request)
    {
        $form = $this->createForm(new ArchetypeType(), $archetype);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('archetype_index');
        }

        return $this->render('AppBundle:archetype:addArchetype.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/remove", name="archetype_remove")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function removeArchetypeAction(Archetype $archetype, Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($archetype);
        $manager->flush();

        return $this->redirectToRoute('archetype_index');
    }

    /**
     * @Route("/archetypes/{archetype}/abilities", name="archetype_ability_add")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function addAbilityAction(Archetype $archetype, Request $request)
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
     * @Route("/archetypes/{archetype}/{id}", name="archetype_ability_update")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("id", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Ability", options={"repository_method"="find"})
     */
    public function updateAbilityAction(Archetype $archetype, Ability $id, Request $request)
    {
        $form = $this->createForm(new AbilityType(), $id);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addAbility.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/remove/{id}", name="archetype_ability_remove")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("id", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Ability", options={"repository_method"="find"})
     */
    public function removeAbilityAction(Archetype $archetype, Ability $id)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($id);
        $manager->flush();

        return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);

    }

    /**
     * @Route("/archetypes/{archetype}/campingSkills", name="archetype_campingskill_add")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function addCampingSkillAction(Archetype $archetype, Request $request)
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
     * @Route("/archetypes/{archetype}/{id}", name="archetype_campingskill_update")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("id", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\CampingSkill", options={"repository_method"="find"})
     */
    public function updateCampingSkillAction(Archetype $archetype, CampingSkill $id, Request $request)
    {
        $form = $this->createForm(new CampingSkillType(), $id);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addCampingSkill.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/remove/{id}", name="archetype_campingskill_remove")
     * @Method({"GET", "POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("id", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\CampingSkill", options={"repository_method"="find"})
     */
    public function removeCampingSkillAction(Archetype $archetype, CampingSkill $id)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($id);
        $manager->flush();

        return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);

    }
}
