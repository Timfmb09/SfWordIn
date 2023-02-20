<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameEvent', TextType::class)
            ->add('dateHourEvent', DateType::class)
            ->add('maxNbRegistrantEvent', TextType::class)
            ->add('descriptionGameEvent', TextType::class)
            ->add('pictureEvent', TextType::class)
            ->add('durationEvent', TextType::class)
            ->add('place', TextType::class)
            ->add('language', TextType::class)
            ->add('usersAttendees', TextType::class)
            ->add('userCreator', TextType::class)
            ->add('submit', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
