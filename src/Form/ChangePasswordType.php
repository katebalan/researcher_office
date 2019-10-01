<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('oldPassword', null, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'off'
                ]
            ])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'Обидва паролі повинні бути однаковими',
                'options' => array(
                    'attr' => array(
                        'class' => 'password-field',
                        'autocomplete' => 'off'
                    )
                ),
                'required' => true,
                'first_options' => [
                    'label' => 'New password'
                ],
                'second_options' => ['label' => 'Repeat password']
            ))
            ->add('submit', SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-sm btn-outline-success mb-2'
                ),
                'label' => 'save'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
