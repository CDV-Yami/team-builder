<?php

namespace Yami\TeamBuilder\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yami\TeamBuilder\AppBundle\Entity\Archetype;
use Yami\TeamBuilder\AppBundle\Entity\Armor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Yami\TeamBuilder\AppBundle\Form\Type\ArchetypeType;
use Yami\TeamBuilder\AppBundle\Form\Type\ArmorType;

class ArmorController extends Controller
{
    /**
     * @Route("/archetypes/{archetype}/armor/create", name="archetype_armor_create")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     */
    public function createAction(Archetype $archetype, Request $request)
    {
        $armor = new Armor();
        $armor->setArchetype($archetype);

        $form = $this->createForm(new ArmorType(), $armor);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($armor);
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addArmor.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/armor/update/{armor}", name="archetype_armor_update")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("armor", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Armor", options={"repository_method"="find"})
     */
    public function updateAction(Archetype $archetype, Armor $armor, Request $request)
    {
        $form = $this->createForm(new ArmorType(), $armor);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);
        }

        return $this->render('AppBundle:archetype:addArmor.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/archetypes/{archetype}/armor/delete/{armor}", name="archetype_armor_delete")
     * @Method({"GET","POST"})
     * @ParamConverter("archetype", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Archetype", options={"repository_method"="findOneByName"})
     * @ParamConverter("armor", converter="doctrine.orm", class="Yami\TeamBuilder\AppBundle\Entity\Armor", options={"repository_method"="find"})
     */
    public function deleteAction(Archetype $archetype, Armor $armor)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($armor);
        $manager->flush();

        return $this->redirectToRoute('archetype_show', ['archetype' => $archetype->getName()]);

    }
}
