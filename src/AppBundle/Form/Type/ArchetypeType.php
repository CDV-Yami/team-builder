<?php

namespace Yami\TeamBuilder\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArchetypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', 'text')
            ->add('stun', 'integer')
            ->add('blight', 'integer')
            ->add('disease', 'integer')
            ->add('deathBlow', 'integer')
            ->add('move', 'integer')
            ->add('bleed', 'integer')
            ->add('debuff', 'integer')
            ->add('trap', 'integer')
            ->add('save', 'submit', array('label' => 'Create new Archetype'))
        ;
    }

    public function getName()
    {
        return 'archetype';
    }
}