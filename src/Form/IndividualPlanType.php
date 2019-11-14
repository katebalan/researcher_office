<?php

namespace App\Form;

use App\Entity\IndividualPlan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndividualPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $discipline = $options['discipline_id'];

        $builder
            ->add('years')
            ->add('disciplines', null, [
                'attr' => [
                    'class' => 'js-select2'
                ],
//                'query_builder' => function(EntityRepository $er) use ($discipline) {
//                    return $er->createQueryBuilder('d')
//                        ->where('t.discipline = :id')
//                        ->setParameter('id', $discipline);
//                },
            ])
            ->add('works', CollectionType::class, [
                'entry_type' => IndividualWorkType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'js-dynamic-collection'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => IndividualPlan::class,
            'discipline_id' => false
        ]);
    }
}
