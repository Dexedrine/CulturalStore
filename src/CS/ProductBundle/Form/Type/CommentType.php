<?php



namespace CS\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 *
 */
class CommentType extends AbstractType
{



  
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	
        $builder
            ->add('note', 'choice', array(
            		'label' => 'Note',
			    'choices'   => array(
			    		'0'   => 0,
			        	'1'   => 1,
			    		'2'   => 2,
			    		'3'   => 3,
			    		'4'   => 4,
			    		'5'   => 5	
			    )))
			->add('text', 'text', array(
                'label' => 'Commentaire'
            ))
			
        ;
    }

  
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class'        => 'CS\ProductBundle\Entity\Comment'
            ))
        ;
    }

    public function getName()
    {
        return 'cs_product_comment';
    }
}
