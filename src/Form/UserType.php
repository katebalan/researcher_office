<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('firstName')
            ->add('secondName')
            ->add('birthDate', DateType::class, [
                'attr' => [
                    'class' => 'js-datepicker-full',
                    'autocomplete' => 'off'
                ],
                'widget' => 'single_text',
                'format' => 'dd MMMM yyyy'
            ])
            ->add('email')
            ->add('patronymic')
            ->add('birthPlace')
            ->add('education')
            ->add('scientificDegree')
            ->add('scientificRank')
            ->add('biography')
            ->add('interest', null, [
                'attr' => [
                    'class' => 'js-select2'
                ]
            ])
            ->add('apiRozkladId', ChoiceType::class, [
                'attr' => [
                    'class' => 'js-api-select2'
                ],
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
