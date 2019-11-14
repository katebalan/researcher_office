<?php

namespace App\Form;

use App\Entity\IndividualWork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndividualWorkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('hours')
            ->add('ternOfExecution')
            ->add('mark', ChoiceType::class, [
                'choices' => [
                    'виконано' => 'виконано',
                    'не виконано' => 'не виконано'
                ]
            ])
            ->add('type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => IndividualWork::class,
        ]);
    }
}
