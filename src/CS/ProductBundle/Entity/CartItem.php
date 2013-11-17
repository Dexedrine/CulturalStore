<?php

// src/App/AppBundle/Entity/CartItem.php
namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Bundle\CartBundle\Model\CartItem as BaseCartItem;

/**
 * @ORM\Entity
 * @ORM\Table(name="cart_item")
 *
 *
 */

class CartItem extends BaseCartItem
{

	/**
	 * @ORM\ManyToOne(targetEntity="CS\ProductBundle\Entity\Product")
	 * @ORM\JoinColumn(name="product_id", referencedColumnName="id"),
	 */
	private $product;
	
	/**
	 * Get product 
	 *
	 * @return Product
	 */
	public function getProduct()
	{
		return $this->product;
	}
	
	/**
	 * Set product
	 * 
	 * @param Product $product
	 * @return Product
	 */
	public function setProduct(Product $product)
	{
		$this->product = $product;
	}
}