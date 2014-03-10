<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;
use CS\ProductBundle\Entity\Product;

/**
 * CS\ProductBundle\Entity\Book
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Book  extends Product{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * Product langue.
	 *
	 * @var string
	 * @ORM\Column(name="langue", type="string")
	 */
	protected $langue ;
	
	/**
	 * Product type.
	 *
	 * @var string
	 * @ORM\Column(name="type", type="string")
	 */
	protected $type;
	
	/**
	 * Product $format.
	 *
	 * @var string
	 * @ORM\Column(name="format", type="string")
	 */
	 protected $format;
	 
	 /**
	  * Product auteur.
	  *
	  * @var string
	  * @ORM\Column(name="auteur", type="string")
	  */
	protected $auteur;
	

	/**
	 * Get productType
	 *
	 * @return string
	 */
	public function getProductType()
	{
		return 'book';
	}
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set langue
     *
     * @param string $langue
     * @return Book
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;
    
        return $this;
    }

    /**
     * Get langue
     *
     * @return string 
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Book
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set format
     *
     * @param string $format
     * @return Book
     */
    public function setFormat($format)
    {
        $this->format = $format;
    
        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Book
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
}
