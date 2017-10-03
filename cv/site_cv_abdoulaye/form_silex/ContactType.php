<?php

namespace MicroCMS\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 
use Symfony\Component\Form\Extension\Core\Type\PasswordType; 
use Symfony\Component\Form\Extension\Core\Type\EmailType; 
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class ContactType extends AbstractType
{
	 public function buildForm(FormBuilderInterface $builder, array $options)
	  {
		$builder
		  -> add('prenom', TextType::class, array(
				'constraints' => array(
					new Assert\NotBlank(),
					new Assert\Length(array(
						'min' => 3,
						'max' => 20
					))
				)
			))
			-> add('nom', TextType::class, array(
				'constraints' => array(
					new Assert\NotBlank(),
					new Assert\Length(array(
						'min' => 3,
						'max' => 20
					))
				)
			))
			-> add('email', TextType::class, array(
				'constraints' => array(
					new Assert\Email(),
				)
			))
			-> add('sujet', ChoiceType::class, array(
				'choices' => array(
					'Proposition de poste' => 'poste',
					'autre' => 'autre'
				)
			))
			->add('message', TextareaType::class, array(
				'constraints' => array(
					new Assert\NotBlank()
				),
				'attr' => array('class' => 'col-md-12')
			));
	  }
}