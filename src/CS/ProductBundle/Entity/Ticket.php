<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;
use CS\ProductBundle\Entity\Product;

/**
 * CS\ProductBundle\Entity\Ticket
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ticket  extends Product {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * Product quantite.
	 *
	 * @var number
	 * @ORM\Column(name="quantite", type="integer")
	 */
	protected $quantite ;
	
	/**
	 * Product lieu.
	 *
	 * @var string
	 * @ORM\Column(name="lieu", type="string")
	 */
	protected $lieu;
	
	/**
	 * Product $type.
	 *
	 * @var string
	 * @ORM\Column(name="type", type="string")
	 */
	 protected $type;
	 
	 /**
	  * Product dateEvent.
	  *
	  * @var string
	  * @ORM\Column(name="dateEvent", type="datetime")
	  */
	protected $dateEvent;

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
	 * Get productType
	 *
	 * @return string
	 */
	public function getProductType()
	{
		return 'ticket';
	}
    

    /**
     * Set quantite
     *
     * @param \number $quantite
     * @return Ticket
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    
        return $this;
    }

    /**
     * Get quantite
     *
     * @return \number 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Ticket
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    
        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Ticket
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
     * Set dateEvent
     *
     * @param \DateTime $dateEvent
     * @return Ticket
     */
    public function setDateEvent($dateEvent)
    {
        $this->dateEvent = $dateEvent;
    
        return $this;
    }

    /**
     * Get dateEvent
     *
     * @return \DateTime 
     */
    public function getDateEvent()
    {
        return $this->dateEvent;
    }
}
