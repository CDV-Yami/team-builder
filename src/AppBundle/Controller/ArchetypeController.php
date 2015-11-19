<?php

namespace Yami\TeamBuilder\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Route("/archetypes/{archetype}/show", name="archetype_show")
     * @Method({"GET"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function showAction(Archetype $archetype)
    {
        return $this->render('AppBundle:archetype:show.html.twig', ['archetype' => $archetype]);
    }

    /**
     * @Route("/archetypes/create", name="archetype_create")
     * @Method({"GET","POST"})
     */
    public function createAction(Request $request)
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
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function updateAction(Archetype $archetype, Request $request)
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
     * @Route("/archetypes/{archetype}/delete", name="archetype_delete")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function deleteAction(Archetype $archetype, Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($archetype);
        $manager->flush();

        return $this->redirectToRoute('archetype_index');
    }
}
