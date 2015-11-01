<?php

namespace Yami\TeamBuilder\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AbilityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', 'text')
            ->add('castPositions', new PositionType(), ['placeholder' => 'Insert cast positions'])
            ->add('targetPositions', new PositionType(), ['placeholder' => 'Insert target positions'])
            ->add('description', 'text')
            ->add('save', 'submit', array('label' => 'Create new Ability'))
        ;
    }

    public function getName()
    {
        return 'ability';
    }
}