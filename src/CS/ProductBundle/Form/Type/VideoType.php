<?php



namespace CS\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 *
 */
class VideoType extends ProductType
{



  
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	
    	parent::buildForm($builder, $options);
        $builder
            ->add('genre', 'choice', array(
            		'label' => 'Genre',
			    'choices'   => array(
			        'aventure'   => 'Aventure',
			        'horreur' => 'Horreur',
			        'comédie'   => 'Comédie',
			    )))
			->add('type', 'choice', array(
					'label' => 'Genre',
			    'choices'   => array(
			        'film'   => 'Film',
			        'documentaire' => 'Documentaire',
			        'concert'   => 'Concert',
			    )))
			->add('duree', 'integer', array (
				'label' => 'Duree' 
		) )
			->add('format', 'choice', array(
					'label' => 'Genre',
			    'choices'   => array(
			        'avi'   => 'avi',
			        'mp4' => 'mp4'
			    )))
			->add('langue', 'text', array (
				'label' => 'Langue' 
		) )
			->add('sublangue', 'text', array (
				'label' => 'Langue des sous-titres' 
		) )
        ;
    }

  
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class'        => 'CS\ProductBundle\Entity\Video'
            ))
        ;
    }

    public function getName()
    {
        return 'cs_product_video';
    }
}
