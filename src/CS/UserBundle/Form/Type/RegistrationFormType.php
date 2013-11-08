<?php

namespace CS\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('nom');
        $builder->add('prenom');
        $builder->add('photo');
        $builder->remove('username');
    }

    public function getName()
    {
        return 'cs_user_registration';
    }
}