<?php

namespace CS\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 */
class TicketType extends ProductType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		parent::buildForm ( $builder, $options );
		$builder->add ( 'genre', 'choice', array (
				'label' => 'Genre',
				'choices' => array (
						'concert' => 'Concert',
						'théâtre' => 'Théâtre',
						'humour' => 'Humour',
						'comédie musicale' => 'Comédie musicale' 
				) 
		) )->add ( 'type', 'text', array (
				'label' => 'Type' 
		) )->add ( 'quantite', 'integer', array (
				'label' => 'Quantite' 
		) )->add ( 'lieu', 'text', array (
				'label' => 'Lieu' 
		) )->add ( 'dateEvent', 'date', array (
				'label' => 'Date du spectacle' 
		) );

		
	}
	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'CS\ProductBundle\Entity\Ticket' 
		) );
	}
	public function getName() {
		return 'cs_product_Ticket';
	}
}
