<?php

// src/App/AppBundle/Entity/Order.php
namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Bundle\OrderBundle\Model\Order as BaseOrder;

/**
 * @ORM\Entity
 * @ORM\Table(name="order")
 *
 *
 */

class Order extends BaseOrder
{	
	/**
	 * @ORM\OneToMany(targetEntity="Sylius\Bundle\OrderBundle\Model\OrderItemInterface", mappedBy="order", cascade={"all"}, orphanRemoval=true)
	 */
	protected $items;
	
	/**
	 * @ORM\OneToMany(targetEntity="Sylius\Bundle\OrderBundle\Model\AdjustmentInterface", mappedBy="order", cascade={"all"}, orphanRemoval=true)
	 */
	protected $adjustments;
}