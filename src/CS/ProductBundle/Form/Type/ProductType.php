<?php



namespace CS\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 *
 */
class ProductType extends AbstractType
{



  
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'Nom'
            ))
            ->add('description', 'textarea', array(
                'label' => 'Description'
            ))
            ->add('price', 'number', array(
            		'label' => 'Prix'
            ))
            ->add('image', 'text', array(
            		'label' => 'URL de l\'image'
            ))
            ->add('file', 'file', array(
            		'label' => 'Fichier'
            ))
        ;
    }

  
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class'        => 'CS\ProductBundle\Entity\Product'
            ))
        ;
    }

    public function getName()
    {
        return 'cs_product';
    }
}
