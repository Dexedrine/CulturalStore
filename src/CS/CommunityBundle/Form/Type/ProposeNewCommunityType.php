<?php

namespace CS\CommunityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProposeNewCommunityType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('tags', 'community_entry',
		array( 'attr' => array('data-role' => "tagsinput", 'placeholder' => "Add tags")));
	}	

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'CS\CommunityBundle\Entity\Theme'
		) );
	}

	public function getName() {
		return 'theme';
	}
}

