<?php

namespace App\Form;

use App\Entity\Individual\PlanDisciplines;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndividualPlanDisciplinesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('semester')
            ->add('department')
            ->add('course')
            ->add('group_codes')
            ->add('discipline')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlanDisciplines::class,
        ]);
    }
}
