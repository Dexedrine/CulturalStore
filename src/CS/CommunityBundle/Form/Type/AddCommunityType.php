<?php

namespace CS\CommunityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddCommunityType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('tags', 'community_entry',
		array( 'attr' => array('data-role' => "tagsinput", 'placeholder' => "Add tags")));
	}

	public function getName() {
		return 'proposeNewCommunity';
	}
}

