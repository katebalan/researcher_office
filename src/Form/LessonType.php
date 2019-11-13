<?php

namespace App\Form;

use App\Entity\Lesson;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $discipline = $options['discipline_id'];

        $builder
            ->add('type', null, [
                'placeholder' => 'Виберіть опцію',
            ])
            ->add('topics', null, [
                'attr' => [
                    'class' => 'js-select2'
                ],
                'query_builder' => function(EntityRepository $er) use ($discipline) {
                    return $er->createQueryBuilder("t")
                        ->where('t.discipline = :id')
                        ->setParameter('id', $discipline);
                },
            ])
            ->add('hours', null, [
                'required' => false
            ])
            ->add('evaluationType')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lesson::class,
            'attr' => [
                'class' => 'js-update-lesson-form'
            ],
            'discipline_id' => null
        ]);
    }
}