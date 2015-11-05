<?php

namespace Yami\TeamBuilder\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AttributesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level', 'integer')
            ->add('health', 'integer')
            ->add('dodge', 'integer')
            ->add('speed', 'integer')
            ->add('critical', 'integer')
            ->add('maxDamages', 'integer')
            ->add('minDamages', 'integer')
            ->add('save', 'submit', array('label' => 'Create new Attributes'))
        ;
    }

    public function getName()
    {
        return 'attributes';
    }
}