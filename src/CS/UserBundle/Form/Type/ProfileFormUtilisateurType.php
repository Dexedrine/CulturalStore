<?php

namespace CS\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface; 
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class RegistrationFormzType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('nom')
        	->add('prenom')
        	->remove('username');
    }

    public function getName()
    {
        return 'cs_utilisateur_profile_form';
    }
}