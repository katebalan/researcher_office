<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('coAuthors', null, [
                'attr' => [
                    'class' => 'js-select2',
                ],
            ])
            ->add('coAuthorsSimple')
            ->add('place')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'MMMM Y',
                'html5' => false,
                'attr' => [
                    'class' => 'js-datepicker',
                    'autocomplete' => 'off',
                ],
            ])
            ->add('pages')
            ->add('notes')
            ->add('file', FileType::class, [
                'label' => 'File (PDF file)',
                'attr' => [
                    'class' => 'fix-bootstrap-file',
                ],
                'required' => false,
            ])
            ->add('realFilename', HiddenType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
