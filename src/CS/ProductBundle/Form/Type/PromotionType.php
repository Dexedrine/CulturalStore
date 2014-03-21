<?php



namespace CS\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 *
 */
class PromotionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	
        $builder
            ->add('percentage', 'percent',array(
            		'label' => 'Pourcentage',
            		'type' => 'integer'))
			->add('beginDate', 'date', array(
				'widget' => 'single_text',
				'format' => 'dd/MM/yyyy',
			    'attr'  => array (
					'class' => 'span2',
			    	'value'	=> date("d/m/Y"),
			    	'size' => 16
			)
					
            ))
            ->add('endDate', 'date', array(
            		'widget' => 'single_text',
            		'format' => 'dd/MM/yyyy',
            		'attr'  => array (
            				'class' => 'span2',
            				'value'	=> date("d/m/Y"),
            				'size' => 16
    			)
            ))
        ;
    }

  
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class'        => 'CS\ProductBundle\Entity\Promotion'
            ))
        ;
    }

    public function getName()
    {
        return 'cs_product_promotion';
    }
}
