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
    public function removeProduct(\CS\ProductBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
        return $this;
    }
    
    public function removeProductWithId($product_id)
    {
    	foreach ($this->products as $product){
    		if ($product->getId() == $product_id){
    			$this->products->removeElement($product);
    			return $this;
    		}
    	}
    	return $this;
    }
    
    /**
     * Remove all products
     *
     */
    public function emptyCart()
    {
        $this->products->clear();
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

}