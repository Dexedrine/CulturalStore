<?php

namespace CS\CartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * CS\CartBundle\Entity\Order
 *
 * @ORM\Table("orders")
 * @ORM\Entity
 */
class Order {
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="datetime")
	 */
	private $date;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $total_price;
	
	/**
	 *
	 * @var \Doctrine\Common\Collections\Collection 
	 * 
	 * @ORM\ManyToMany(targetEntity="CS\ProductBundle\Entity\Product")
	 *      @ORM\JoinTable(name="order_item",
	 *      joinColumns={
	 *      @ORM\JoinColumn(name="order_id", referencedColumnName="id")
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
	 * @ORM\ManyToOne(targetEntity="CS\UserBundle\Entity\Utilisateur")
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

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Order
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set total_price
     *
     * @param integer $totalPrice
     * @return Order
     */
    public function setTotalPrice($totalPrice)
    {
        $this->total_price = $totalPrice;
    
        return $this;
    }

    /**
     * Get total_price
     *
     * @return integer 
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }
}