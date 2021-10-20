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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Gregwar\CaptchaBundle\Type\CaptchaType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       

        $builder


        //->add('isVerified', ChoiceType::class, array(
           //// 'choices'  => array(
         //       'No' => false,
        //    ),
            // *this line is important*
            //'isVerified' => true,
       // ))
               ->add('captcha', CaptchaType::class, array(
                'width' => 150,
                'length' => 4,
                'ignore_all_effects' => true ,
                'quality' => 100,
                'label' => '    ',
                'height' => 80,
                
            ))
                ->add(
                'firstname',
                TextType::class,
                [
                'label' => 'Prenom *',
                'required' => true,
                ],
               
                )
   
                ->add(
                'lastname',
                TextType::class,
                [
                'label' => 'Nom *'
                ],
                )

                
                ->add('birthdate', BirthdayType::class, [
                    'placeholder' => [
                        'day' => 'Jour', 'month' => 'Mois',  'year' => 'Annee'
                    ],
                    'label' => 'Date de naissance *'
                ])

                ->add(
                    'adress',
                    TextType::class,
                    [
                        'label' => 'Adresse *'
                    ],
                    )
                ->add('email', null, [
                    'help' => 'Format : monadresse@fournisseur.fr',
                    'label' => 'email *'
                ])

            
            
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
                'label' => 'Mot de passe *',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe *',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Votre mot de passe doit être au minimun de {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
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
