<?php

namespace PiouPiou\RibsAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditArticle extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('titleTag', TextType::class, [
				'label' => 'Title tag of the page',
				'label_attr' => [
					'class' => 'label'
				],
				'attr' => [],
				'required' => true
			])
			->add('descriptionTag', TextType::class, [
				'label' => 'Description tag of the page',
				'label_attr' => [
					'class' => 'label'
				],
				'attr' => [],
				'required' => true
			])
			->add('url', TextType::class, [
				'label' => 'Url of the page',
				'label_attr' => [
					'class' => 'label'
				],
				'attr' => [],
				'required' => true
			])
			->add('title', TextType::class, [
				'label' => 'Title of the article',
				'label_attr' => [
					'class' => 'label'
				],
				'attr' => [],
				'required' => true
			])
			->add('submit', SubmitType::class, [
				'label' => 'Validate',
				'attr' => []
			]);
	}
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => \PiouPiou\RibsAdminBundle\Entity\AccessRight::class,
		]);
	}
}