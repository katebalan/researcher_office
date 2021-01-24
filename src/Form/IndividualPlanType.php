<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\IndividualPlan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndividualPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $discipline = $options['discipline_id'];

        $builder
            ->add('years')
            ->add('disciplines', null, [
                'attr' => [
                    'class' => 'js-select2',
                ],
                'label' => 'discipline_semester_1',
//                'query_builder' => function(EntityRepository $er) use ($discipline) {
//                    return $er->createQueryBuilder('d')
//                        ->where('t.discipline = :id')
//                        ->setParameter('id', $discipline);
//                },
            ])
            ->add('disciplines2', null, [
                'attr' => [
                    'class' => 'js-select2',
                ],
                'label' => 'discipline_semester_2',
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
            'data_class' => IndividualPlan::class,
            'discipline_id' => false,
        ]);
    }
}
