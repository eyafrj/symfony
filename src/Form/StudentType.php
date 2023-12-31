<?php

namespace App\Form;
use App\Entity\Classroom;
use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('classroom', EntityType::class, [ // Utilisez le bon type ici (EntityType)
                'class' => Classroom::class,
                'choice_label' => 'name', // Indiquez ici le nom de la propriété à afficher
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer', // Texte du bouton d'enregistrement
                'attr' => ['class' => 'btn btn-primary'], // Classe CSS du bouton (facultatif)
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
