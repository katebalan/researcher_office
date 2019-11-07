<?php

namespace App\Form;

use App\Entity\Lesson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', null, [
                'placeholder' => 'Виберіть опцію',
            ])
            ->add('topics', null, [
                'attr' => [
                    'class' => 'js-select2'
                ]
            ])
            ->add('hours')
            ->add('evaluationType')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lesson::class,
            'attr' => [
                'class' => 'js-update-lesson-form'
            ]
        ]);
    }
}
