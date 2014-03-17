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
class Music extends Product{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * Product duree.
	 *
	 * @var int
	 * @ORM\Column(name="duree", type="integer")
	 */
	protected $duree ;
	
	/**
	 * Product nbPistes.
	 *
	 * @var int
	 * @ORM\Column(name="nbPistes", type="integer")
	 */
	protected $nbPistes;
	
	/**
	 * Product $format.
	 *
	 * @var string
	 * @ORM\Column(name="format", type="string")
	 */
	 protected $format;
	 
	 /**
	  * Product artiste.
	  *
	  * @var string
	  * @ORM\Column(name="artiste", type="string")
	  */
	protected $artiste;
	

	/**
	 * Get productType
	 *
	 * @return string
	 */
	public function getProductType()
	{
		return 'music';
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
     * Set duree
     *
     * @param \number $duree
     * @return Music
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    
        return $this;
    }

    /**
     * Get duree
     *
     * @return \number 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set nbPistes
     *
     * @param \number $nbPistes
     * @return Music
     */
    public function setNbPistes($nbPistes)
    {
        $this->nbPistes = $nbPistes;
    
        return $this;
    }

    /**
     * Get nbPistes
     *
     * @return \number 
     */
    public function getNbPistes()
    {
        return $this->nbPistes;
    }

    /**
     * Set format
     *
     * @param string $format
     * @return Music
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
     * Set artiste
     *
     * @param string $artiste
     * @return Music
     */
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;
    
        return $this;
    }

    /**
     * Get artiste
     *
     * @return string 
     */
    public function getArtiste()
    {
        return $this->artiste;
    }
}
