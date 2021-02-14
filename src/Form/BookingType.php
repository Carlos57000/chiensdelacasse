<?php

namespace App\Form;

use App\Entity\Booking;
use Doctrine\ORM\Query\AST\Functions\CurrentTimeFunction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType; //je l'ai ajouté !!!
use Symfony\Component\Form\Extension\Core\Type\TextType; //je l'ai ajouté !!!
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; //je l'ai ajouté  pour le faux champ CHIEN (temporaire pour la présentation) !!!

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder //j'ai ajouté DateTimeType et ce qui suit
            ->add('beginAt', DateTimeType::class, 
            [
                'date_widget' => 'single_text',
                'hours' => range(8, 20),
                'minutes' => [00, 15, 30, 45], 
                'label' => 'Début___________________',
            ])
            ->add('endAt', DateTimeType::class,
            [
                'date_widget' => 'single_text',
                'hours' => range(8, 20),
                'minutes' => [00, 15, 30, 45],
                'label' => 'Fin______________________',
            ]) 
            ->add('title', ChoiceType::class, //COMPLETEMENT BIDON, A MODIFIER AVEC CODE AFFICHANT CHIENS DU JOUR DISPOS!!!!!!!!!!!!!!!
            [
                'label' => 'Chien_______________________',
                'choices' => [
                    'Je choisis un chien' => '',
                    'Lucky' => 'Lucky',
                    'Lycos' => 'Lycos',
                    'Snoopy' => 'Snoopy',
                    'Lasko' => 'Lasko',
                    'Scooby' => 'Scooby',
                    'Rex' => 'Rex',
                ],
            ])      
            /* ->add('title', TextType::class, //A rétablir quand je saurai comment afficher chiens dispos!!!!!!!
            [
                'label' => 'Commentaires_____________',
                "required" => false,
            ]) */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}