<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Individual\Plan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndividualPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('years')
            ->add('individualPlansDisciplines', CollectionType::class, [
                'entry_type' => IndividualPlanDisciplinesType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
            ])
            ->add('works', CollectionType::class, [
                'entry_type' => IndividualWorkType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'js-dynamic-collection',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plan::class,
        ]);
    }
}
