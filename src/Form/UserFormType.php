<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class, [
                 'label' =>'E-mail',
                 'constraints'=>[
                    new Email([
                        'message' =>"votre email n'est pas au bon format :mail@exemple.fr"
                    ]),
                    new NotBlank([
                        'message' => 'Ce champ ne peut pas etre vide'
                    ])
                    new length([
                        'min' =>8,
                        'max' =>255,
                        'minMessage'=>"votre email doit comporte{{link}} caracteres minimum.",
                        'minMessage'=>"votre email doit comporte{{link}} caracteres minimum.",
                    ]),
                 ],  
                 'help' => "* min caracteres : 8
                            * max carcateres :255
                            *au moins 1 caractere special,
                            *au moins 1 majuscule,
                            *au moins 1 minuscule,
                            *au moins 1 chiffre"
             ])
            ->add('password', PasswordType::class,[
                 'label' =>'Mot de passe'
             ])


            ->add('firstname', TextType::class,[
                 'label' =>'Prenom'
             ])


            ->add('lastname', TextType::class, [
                 'label' =>'Nom'
              ])


            ->add('genre', ChoiceType::class,[
                 'label' =>'sexe'
                 'expanded' => true
                 'choices' =>[
                     "Homme" => 'homme'
                     "Femme" => 'femme'

                 ],
            ;
              
       
              
                ]),
   
            }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

