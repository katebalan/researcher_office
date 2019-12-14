<?php

namespace App\Form;

use App\Entity\User;
use App\Service\ApiRozkladService;
use App\Service\ApiService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    private $apiService;

    public function __construct(ApiRozkladService $apiService)
    {
        $this->apiService = $apiService;
    }

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
            ->add('scientificIdentities', CollectionType::class, [
                'entry_type' => ScientificIdentityType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'by_reference' => false,
                'attr' => [
                    'class' => 'js-dynamic-collection'
                ],
                'label' => 'scientific_identity'
            ])
            ->add('interest', null, [
                'attr' => [
                    'class' => 'js-select2'
                ]
            ])
            ->add('apiRozkladId', HiddenType::class)
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                [$this, 'onPreSetData']
            )
            ->addEventListener(
                FormEvents::PRE_SUBMIT,
                [$this, 'onPreSubmit']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'allow_extra_fields' => true
        ]);
    }

    public function onPreSetData(FormEvent $event)
    {
        /** @var User $data */
        $data = $event->getData();
        $form = $event->getForm();

        $choices = [];
        if (($id = $data->getApiRozkladId()) != null) {
            $choices[] = $this->apiService->getChoice($id);
        }

        $form
            ->add('fakeApiRozkladId', ChoiceType::class, [
                'attr' => [
                    'class' => 'js-api-select2',
                ],
                'mapped' => false,
                'choices' => $choices,
                'label' => 'api_rozklad_id'
            ]);
    }

    public function onPreSubmit(FormEvent $event)
    {
        /** @var array $data */
        $data = $event->getData();
        $form = $event->getForm();

        if (key_exists('fakeApiRozkladId', $data) && $data['fakeApiRozkladId'] != null) {
            $data['apiRozkladId'] = $data['fakeApiRozkladId'];
        }

        $form->remove('fakeApiRozkladId');

        $event->setData($data);
    }
}
