<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;
use CS\ProductBundle\Entity\Product;

/**
 * CS\ProductBundle\Entity\Game
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Game  extends Product {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * Product plateforme.
	 *
	 * @var string
	 * @ORM\Column(name="plateforme", type="string")
	 */
	protected $plateforme ;
	
	/**
	 * Product PEGI.
	 *
	 * @var string
	 * @ORM\Column(name="PEGI", type="string")
	 */
	protected $PEGI;
	

	/**
	 * Get productType
	 *
	 * @return string
	 */
	public function getProductType()
	{
		return 'game';
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
     * Set plateforme
     *
     * @param string $plateforme
     * @return Game
     */
    public function setPlateforme($plateforme)
    {
        $this->plateforme = $plateforme;
    
        return $this;
    }

    /**
     * Get plateforme
     *
     * @return string 
     */
    public function getPlateforme()
    {
        return $this->plateforme;
    }

    /**
     * Set PEGI
     *
     * @param string $pEGI
     * @return Game
     */
    public function setPEGI($pEGI)
    {
        $this->PEGI = $pEGI;
    
        return $this;
    }

    /**
     * Get PEGI
     *
     * @return string 
     */
    public function getPEGI()
    {
        return $this->PEGI;
    }
}
