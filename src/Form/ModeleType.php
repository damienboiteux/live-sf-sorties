<?php

namespace App\Form;

use App\Entity\Marque;
use App\Entity\Modele;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ModeleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label' => 'Modèle',
                'attr' => [
                    'placeholder' => 'Saisir un modèle',
                ]
            ])
            // ChoiceType : permet de déclarer une liste de choix manuellement
            // ->add('marque', ChoiceType::class, [
            //     'label'     => 'Liste',
            //     'choices'   => [
            //         'Audi'      => 'Audi d',
            //         'BMW'       => 'BMW d' ,
            //         'Citroën'   => 'Citroën d',
            //         'Fiat'      => 'Fiat',
            //         'Ford'      => 'Ford',
            //         'Mercedes'  => 'Mercedes',
            //         'Opel'      => 'Opel',
            //         'Peugeot'   => 'Peugeot',
            //         'Renault'   => 'Renault',
            //         'Volkswagen'=> 'Volkswagen',
            //     ],
            //     'mapped'        => false,
            //     'placeholder'   => 'Choisir une marque',
            //     'expanded'      => false,
            //     'multiple'      => false,
            //     ])
            // EntityType : permet de déclarer une liste de choix à partir d'une entité
            ->add('marque', EntityType::class, [
                'label'     => 'Liste',
                'class'         => Marque::class,  // FQCN de l'entité
                'choice_label'  => 'libelle', // Attributs de l'entité (ie: colonne de la table)
                'mapped'        => true, // valeur par défaut
                'placeholder'   => 'Choisir une marque',
                'expanded'      => false, // valeur par défaut. Checkox ou radio si true
                'multiple'      => false, // valeur par défaut. Choix multiple si true (=> checkbox et bouton radio si false)
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Modele::class,
        ]);
    }
}
