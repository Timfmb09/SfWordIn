<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Event;
use App\Entity\Place;
use App\Entity\Language;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameEvent', TextType::class)

            ->add('dateHourEvent', DateType::class, [
                'widget' => 'single_text' 
                ])
                
            ->add('durationEvent', TimeType::class,[ 
                'placeholder' => [
                'hour' => 'Hour', 
                'minute' => 'Minute',
                ]
                ])

            ->add('place', EntityType::class,[
                'class' => Place::class,
                'choice_label' => 'namePlace',
                'placeholder' => 'lieu'
                ])
            ->add('maxNbRegistrantEvent', IntegerType::class,[ 
                'attr' => array('min' => 0, 'max' =>6)
                ])
            
            ->add('language', EntityType::class,[
                'class' => Language::class,
                'choice_label' => 'nameLanguage',
                'placeholder' => 'langue'
                ])           
            ->add('descriptionGameEvent', TextType::class)
            // ->add('usersAttendees', TextType::class)

            // ->add('userCreator', TextType::class,[
            //     'class' => User::class,
            //     'choice_label' => 'pseudo',
            //     'placeholder' => 'auteur'
            //     ])
            // ->add('pictureEvent', TextType::class)
            ->add('valider', SubmitType::class,[
                'attr' => ['class' => 'btn']
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
