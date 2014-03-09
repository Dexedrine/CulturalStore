<?php

namespace CS\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 */
class MusicType extends ProductType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		parent::buildForm ( $builder, $options );
		$builder->add ( 'genre', 'choice', array (
				'label' => 'Genre',
				'choices' => array (
						'chanson' => 'Chanson',
						'rock' => 'Rock',
						'rap' => 'Rap' 
				) 
		) )->add ( 'duree', 'integer', array (
				'label' => 'Duree' 
		) )->add ( 'nbPistes', 'integer', array (
				'label' => 'Nombres de pistes' 
		) )->add ( 'artiste', 'text', array (
				'label' => 'Artiste' 
		) )->add ( 'format', 'choice', array (
				'label' => 'Format',
				'choices' => array (
						'mp3' => 'mp3',
						'wav' => 'wav',
						'ogg' => 'ogg' 
				) 
		) );

		
	}
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'CS\ProductBundle\Entity\Music' 
		) );
	}
	public function getName() {
		return 'cs_product_video';
	}
}
