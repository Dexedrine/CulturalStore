<?php

namespace CS\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface; 
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormUtilisateurType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('nom')
        	->add('adresse')
        	->add('codepostal')
        	->add('ville')
        	->add('SIRET')
        	->remove('username');
    }

    public function getName()
    {
        return 'cs_fournisseur_profile_form';
    }
}