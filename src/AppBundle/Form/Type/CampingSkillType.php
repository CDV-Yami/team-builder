<?php

namespace Yami\TeamBuilder\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CampingSkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', 'text')
            ->add('timeCost', new CostType(), ['placeholder' => 'Insert time cost'])
            ->add('target', new TargetType(), ['placeholder' => 'Insert target'])
            ->add('description', 'text')
            ->add('save', 'submit', array('label' => 'Create new Camping Skill'))
        ;
    }

    public function getName()
    {
        return 'campingSkill';
    }
}