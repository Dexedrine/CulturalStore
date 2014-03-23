<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CS\ProductBundle\Entity\InfoTracking
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class InfoTracking{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * Comment visite.
	 *
	 * @var int
	 * @ORM\Column(name="visite", type="integer")
	 */
	protected $visite ;
	
	/**
	 * Comment achat.
	 *
	 * @var int
	 * @ORM\Column(name="achat", type="integer")
	 */
	protected $achat;
	
	
	
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->visite= 0;
		$this->achat = 0;
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
     * Set visite
     *
     * @param string $visite
     * @return InfoTracking
     */
    public function setVisite($visite)
    {
        $this->visite = $visite;
    
        return $this;
    }

    /**
     * Get visite
     *
     * @return int
     */
    public function getVisite()
    {
        return $this->visite;
    }

    /**
     * Set achat
     *
     * @param int $achat
     * @return InfoTracking
     */
    public function setAchat($achat)
    {
        $this->achat = $achat;
    
        return $this;
    }

    /**
     * Get achat
     *
     * @return int
     */
    public function getAchat()
    {
        return $this->achat;
    }

    public function addAchat(){
    
    	$this->achat += 1;
    
    	return $this;
    }
    
   public function addVisite(){

   		$this->visite += 1;
   	
   	   return $this;
   }
}