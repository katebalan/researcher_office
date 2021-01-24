<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Lesson;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $discipline = $options['discipline_id'];

        $builder
            ->add('type', null, [
                'placeholder' => 'Виберіть опцію',
            ])
            ->add('topics', null, [
                'attr' => [
                    'class' => 'js-select2',
                ],
                'query_builder' => function (EntityRepository $er) use ($discipline) {
                    return $er->createQueryBuilder('t')
                        ->where('t.discipline = :id')
                        ->setParameter('id', $discipline);
                },
                'group_by' => function ($choice, $key, $value) {
                    if ($choice->getParentTopic() === null) {
                        return 'Розділи';
                    }

                    return 'Розділ "' . $choice->getParentTopic()->getName() . '"';
                },
            ])
            ->add('hours', null, [
                'required' => false,
            ])
            ->add('evaluationType');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lesson::class,
            'attr' => [
                'class' => 'js-update-lesson-form',
            ],
            'discipline_id' => null,
        ]);
    }
}
