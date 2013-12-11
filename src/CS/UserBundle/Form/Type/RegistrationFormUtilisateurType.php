<?php

namespace CS\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface; 
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormUtilisateurType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('nom')
        	->add('prenom')
        	->add('optin_donnee', 'checkbox', array('data'=>true, 'label'=>"J'accepte que mes coordonnées soient utilisées dans un but commercial"))
        	->add('optin_newsletter', 'checkbox', array('data'=>false, 'label'=>"J'accepte de recevoir des informations de la part de CulturalStore et de ses partenaires commerciaux"))
        	->remove('username');
    }

    public function getName()
    {
        return 'cs_utilisateur_registration_form';
    }
}