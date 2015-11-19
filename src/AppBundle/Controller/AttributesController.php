<?php

namespace Yami\TeamBuilder\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yami\TeamBuilder\AppBundle\Entity\Ability;
use Yami\TeamBuilder\AppBundle\Entity\Archetype;
use Yami\TeamBuilder\AppBundle\Entity\Attributes;
use Yami\TeamBuilder\AppBundle\Entity\CampingSkill;
use Yami\TeamBuilder\AppBundle\Form\Type\AttributesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Yami\TeamBuilder\AppBundle\Form\Type\ArchetypeType;
use Yami\TeamBuilder\AppBundle\Form\Type\CampingSkillType;

class AttributesController extends Controller
{
    /**
     * @Route("/archetypes/{archetype}/attributes/create", name="archetype_attributes_create")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function createAction(Archetype $archetype, Request $request)
    {
        $attributes = new Attributes();
        $attributes->setArchetype($archetype);

        $form = $this->createForm(new AttributesType(), $attributes);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($attributes);
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addAttributes.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/attributes/update/{attributes}", name="archetype_attributes_update")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("attributes", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\attributes", options={"repository_method"="find"})
     */
    public function updateAction(Archetype $archetype, Attributes $attributes, Request $request)
    {
        $form = $this->createForm(new AttributesType(), $attributes);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addAttributes.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/attributes/delete/{attributes}", name="archetype_attributes_delete")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("attributes", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\attributes", options={"repository_method"="find"})
     */
    public function deleteAction(Archetype $archetype, Attributes $attributes)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($attributes);
        $manager->flush();

        return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);

    }
}
