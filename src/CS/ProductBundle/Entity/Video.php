<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;
use CS\ProductBundle\Entity\Product;

/**
 * CS\ProductBundle\Entity\Video
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Video extends Product{

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
	 * Product sublangue.
	 *
	 * @var string
	 * @ORM\Column(name="sublangue", type="string")
	 */
	protected $sublangue ;
	
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
	  * Product duree.
	  *
	  * @var string
	  * @ORM\Column(name="duree", type="integer")
	  */
	protected $duree;
	
	
	
	/**
	 * Get product_type
	 *
	 * @return string
	 */
	public function getProduct_type()
	{
		return 'video';
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
     * @return Video
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
     * Set sublangue
     *
     * @param string $sublangue
     * @return Video
     */
    public function setSublangue($sublangue)
    {
        $this->sublangue = $sublangue;
    
        return $this;
    }

    /**
     * Get sublangue
     *
     * @return string 
     */
    public function getSublangue()
    {
        return $this->sublangue;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Video
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
     * @return Video
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
     * Set duree
     *
     * @param \number $duree
     * @return Video
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
}