<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Individual\Work;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndividualWorkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('hours')
            ->add('ternOfExecution')
            ->add('mark', ChoiceType::class, [
                'choices' => [
                    'done' => 'done',
                    'not_done' => 'not_done',
                ],
            ])
            ->add('type');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Work::class,
        ]);
    }
}
