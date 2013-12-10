<?php

namespace CS\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * CS\CartBundle\Entity\Cart
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cart {
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;
	
	/**
	 *
	 * @var \Doctrine\Common\Collections\Collection 
	 * 
	 * @ORM\ManyToMany(targetEntity="CS\ProductBundle\Entity\Product")
	 *      @ORM\JoinTable(name="cart_item",
	 *      joinColumns={
	 *      @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
	 *      },
	 *      inverseJoinColumns={
	 *      @ORM\JoinColumn(name="product_id", referencedColumnName="id")
	 *      }
	 *      )
	 */
	private $products;
	
	
	/**
	 * 
	 * @var CS\UserBundle\Entity\Utilisateur
	 * 
	 * @ORM\OneToOne(targetEntity="CS\UserBundle\Entity\Utilisateur")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	private $user;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->products = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add products
     *
     * @param \CS\ProductBundle\Entity\Product $products
     * @return Cart
     */
    public function addProduct(\CS\ProductBundle\Entity\Product $products)
    {
        $this->products[] = $products;
    
        return $this;
    }

    /**
     * Remove products
     *
     * @param \CS\ProductBundle\Entity\Product $products
     */
    public function removeProduct(\CS\ProductBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set user
     *
     * @param \CS\UserBundle\Entity\Utilisateur $user
     * @return Cart
     */
    public function setUser(\CS\UserBundle\Entity\Utilisateur $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \CS\UserBundle\Entity\Utilisateur 
     */
    public function getUser()
    {
        return $this->user;
    }
}