<?php

namespace CS\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface; 
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormAdminType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

    }

    public function getName()
    {
        return 'cs_admin_registration_form';
    }
}