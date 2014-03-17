<?php



namespace CS\ProductBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Product form type.
 *
 */
class BookType extends ProductType
{



  
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
        $builder
            ->add('genre', 'choice', array(
            		'label' => 'Genre',
			    'choices'   => array(
			        'roman'   => 'Roman',
			        'essai' => 'Essai',
			        'biographie'   => 'Biographie',
			    )))
			->add('langue', 'text', array(
                'label' => 'Langue'
            ))
			->add('type', 'choice', array(
					'label' => 'Type',
			    'choices'   => array(
			        'livre'   => 'Livre',
			        'magazine' => 'Magazine'
			    )))
			->add('format', 'choice', array(
					'label' => 'Format',
			    'choices'   => array(
			        'epub'   => 'ePub',
			        'pdf' => 'pdf',
			        'mobi'   => 'mobi',
			    )))
			->add('auteur', 'text', array(
                'label' => 'Auteur'
            ))
        ;
    }

  
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class'        => 'CS\ProductBundle\Entity\Book'
            ))
        ;
    }

    public function getName()
    {
        return 'cs_product_book';
    }
}
