<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('roles', ChoiceType::class, array(
            'attr'  =>  array('class' => 'form-control',
            'style' => 'margin:5px 0;'),
            'choices' => 
            array
            (
                'ROLE_ADMIN' => array
                (
                    'Yes' => 'ROLE_ADMIN',
                ),
                'ROLE_HABITANT' => array
                (
                    'Yes' => 'ROLE_HABITANT'
                ),
                'ROLE_EMPLOYE' => array
                (
                    'Yes' => 'ROLE_EMPLOYE'
                ),
            ) 
            ,
            'multiple' => true,
            'required' => true,
            )
        )

        ->add('isVerified', ChoiceType::class, array(
            'choices'  => array(
                'No' => false,
            ),
            // *this line is important*
            //'isVerified' => true,
        ))
            ->add('firstname')
            ->add('lastname')
            ->add('birthdate')
            ->add('adress')
            ->add('email')
            
            //*->add('agreeTerms', CheckboxType::class, [
              //  'mapped' => false,
               // 'constraints' => [
                   // new IsTrue([
                      //  'message' => 'You should agree to our terms.',
                    //]),
               // ],
            //])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
