<?php

namespace CS\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 */
class GameType extends ProductType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		parent::buildForm ( $builder, $options );
		$builder->add ( 'genre', 'choice', array (
				'label' => 'Genre',
				'choices' => array (
						'stratégie' => 'Stratégie',
						'aventure' => 'Aventure',
						'sport' => 'Sport' 
				) 
		) )->add ( 'plateforme', 'choice', array (
				'label' => 'Plateforme',
				'choices' => array (
						'windows' => 'Windows',
						'linux' => 'Linux',
						'macOS' => 'MacOS',
						'android' => 'Android' 
				) 
		) )->add ( 'PEGI', 'choice', array (
				'label' => 'PEGI',
				'choices' => array (
						'3+' => '3+',
						'12+' => '12+',
						'16+' => '16+',
						'18+' => '18+' 
				) 
		) );
	}
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'CS\ProductBundle\Entity\Game' 
		) );
	}
	public function getName() {
		return 'cs_product_game';
	}
}
