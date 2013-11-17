<?php

// src/App/AppBundle/Entity/Product.php
namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Bundle\CartBundle\Model\CartItem;
use Sylius\Bundle\OrderBundle\Model\OrderItemInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="cart_product")
 *
 *
 */

class Product extends CartItem implements OrderItemInterface
{
    // Your code...

    public function getSellableName()
    {
        // Here you just have to return the nice display name of your merchandise.
        return $this->name;
    }
}