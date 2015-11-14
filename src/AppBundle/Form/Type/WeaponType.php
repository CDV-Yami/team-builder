<?php

namespace Yami\TeamBuilder\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class WeaponType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', 'text')
            ->add('level', 'integer')
            ->add('description', 'text')
            ->add('save', 'submit', array('label' => 'Create new Armor'))
        ;
    }

    public function getName()
    {
        return 'weapon';
    }
}