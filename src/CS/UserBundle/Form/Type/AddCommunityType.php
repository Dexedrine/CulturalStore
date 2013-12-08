<?php

namespace CS\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddCommunityType extends AbstractType {
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('tags', 'community_entry',
		array( 'attr' => array('data-role' => "tagsinput", 'placeholder' => "Add tags")));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults ( array (
				'data_class' => 'CS\UserBundle\Entity\Utilisateur'
		) );
	}

	public function getName() {
		return 'user';
	}
}

