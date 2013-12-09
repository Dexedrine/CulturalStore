<?php

// src/App/AppBundle/Entity/Product.php
namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Sylius\Bundle\OrderBundle\Model\SellableInterface;
use Sylius\Bundle\ProductBundle\Model\Product as BaseProduct;

class Product extends BaseProduct implements SellableInterface
{
    // Your code...

    public function getSellableName()
    {
        // Here you just have to return the nice display name of your merchandise.
        return $this->name;
    }
}