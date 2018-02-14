<?php

namespace PiouPiou\RibsBlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
			->add('descriptionTag', TextareaType::class, [
				'label' => 'Description tag of the page',
				'label_attr' => [
					'class' => 'label label-textarea'
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
			->add('publicationDate', DateType::class, [
				'label' => 'Publication date of the article',
				'label_attr' => [
					'class' => 'label'
				],
				'attr' => [],
				'widget' => 'single_text',
				'format' => 'dd/MM/yyyy',
				'html5' => false,
				'required' => true
			])
			->add('article', TextareaType::class, [
				'label' => 'Article',
				'label_attr' => [
					'class' => 'label label-textarea'
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
			'data_class' => \PiouPiou\RibsBlogBundle\Entity\Article::class,
		]);
	}
}