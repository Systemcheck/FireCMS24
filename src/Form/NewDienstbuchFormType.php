<?php

namespace App\Form;

use App\Entity\Dienstbuch;
use App\Entity\Members;
use App\Repository\MembersRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Form\Types\PresenceType;

class NewDienstbuchFormType extends AbstractType
{
    
    private $membersRepository;
    private $values;
    

    public function __construct(MembersRepository $membersRepository)
    {
        $this->membersRepository = $membersRepository;
        $this->values = $membersRepository;
        
        //dd(new \DateTime());
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices2 = $this->membersRepository->findAllMembers();
        
        foreach($choices2 as $choice) {
         $choices[] = $choice;
            
           
           
        }
        $builder
            ->add('startdate', DateTimeType::class, [
                //'input' => 'string',
                //'data' => '2019-02-06 17:00:00',
                'data' => new \DateTime(),
                'label' => 'Beginn',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control js-datepicker'],
                'date_format' => 'yyyy-MM-dd HH:mm',
                
                
                
            ])
            ->add('enddate', DateTimeType::class, [
                'label' => 'Ende',
                'data' => new \DateTime('now +2 hours'),
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control js-datepicker'],
                'date_format' => 'yyyy-MM-dd HH:mm',
                
            ])
            
            ->add('member', ChoiceType::class, [
                
                'choices' => $choices,
                'choice_label' => function ($choiceValue, $key, $value) {
                    if ($value == $choiceValue) {
                        return 'Definitely!';
                    }
            dump($choiceValue);
                    return strtoupper($choiceValue);
            
                    // or if you want to translate some key
                    //return 'form.choice.'.$key;
                },
                
                'label'     => 'Anwesenheit',
                'expanded'  => true,
                'multiple'  => true,
            ])
            
            ->add('title', TextType::class, [
                'label' => 'title',
                'attr'=> array('class'=>'form-control'),

            ])
            
            ->add('description', TextareaType::class, [
                'label' => 'Thema',
                'attr'=> array('class'=>'form-control'),
            ])

            ->add('trainer', EntityType::class, [
                'multiple' => true,
                'expanded' => false,
                
                'class' => Members::class,
                'choices' => $this->membersRepository->findAllByExecutive(),
                'placeholder' => 'Ausbilder',
                'label' => 'Ausbilder',
                'attr'=> array('class'=>'form-control'),
               
                ])
                ->add('Speichern', SubmitType::class);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dienstbuch::class,
        ]);
    }
}
