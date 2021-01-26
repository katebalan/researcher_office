<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Discipline;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DisciplineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('department')
            ->add('course')
            ->add('groupCodes')
            ->add('overview', CKEditorType::class)
            ->add('goal', CKEditorType::class)
            ->add('task', CKEditorType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Discipline::class,
        ]);
    }
}
