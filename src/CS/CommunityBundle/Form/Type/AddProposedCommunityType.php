<?php

namespace CS\CommunityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddProposedCommunityType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('proposedCommunities', 'community_entry',
		array( 'attr' => array('data-role' => "tagsinput", 'placeholder' => "Add tags")));
	}	

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'CS\ProductBundle\Entity\Product'
		) );
	}

	public function getName() {
		return 'product';
	}
}

