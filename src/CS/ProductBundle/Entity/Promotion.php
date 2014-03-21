<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CS\ProductBundle\Entity\Promotion
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="CS\ProductBundle\Repository\PromotionRepository")
 */
class Promotion{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	
	/**
	 * Comment percentage.
	 *
	 * @var int
	 * @ORM\Column(name="percentage", type="integer")
	 */
	protected $percentage;
	
	/**
	 *
	 * @var \Doctrine\Common\Collections\Collection 
	 * 
	 * @ORM\ManyToMany(targetEntity="CS\ProductBundle\Entity\Product", mappedBy="promotions")
	 *   
	 */
	private $products;

	/**
	 *
	 * @var CS\UserBundle\Entity\Fournisseur
	 *
	 * @ORM\ManyToOne(targetEntity="CS\UserBundle\Entity\Fournisseur")
	 * @ORM\JoinColumn(name="fournisseur_id", referencedColumnName="id")
	 */
	private $fournisseur;
	
	
	/**
	 * Creation time.
	 *
	 * @var \DateTime
	 * @ORM\Column(name="begin_date", type="datetime")
	 */
	protected $beginDate;
	
	/**
	 * Creation time.
	 *
	 * @var \DateTime
	 * @ORM\Column(name="end_date", type="datetime")
	 */
	protected $endDate;
	
	
	
	
	
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
     * Set percentage
     *
     * @param int $percentage
     * @return Percentage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    
        return $this;
    }

    /**
     * Get percentage
     *
     * @return int
     */
    public function getPercentage()
    {
        return $this->percentage;
    }


    /**
     * Set product
     *
     * @param \CS\ProductBundle\Entity\Product $product
     * @return Comment
     */
    public function setProduct(\CS\ProductBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \CS\ProductBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
    
    
   
    
    /**
     * Set beginDate
     *
     * @param \DateTime $beginDate
     * @return Promotion
     */
    public function setBeginDate($beginDate)
    {
    	$this->beginDate = $beginDate;
    
    	return $this;
    }
    
    /**
     * Get beginDate
     *
     * @return \DateTime
     */
    public function getBeginDate()
    {
    	return $this->beginDate;
    }
    
    

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Promotion
     */
    public function setEndDate($endDate)
    {
    	$this->endDate = $endDate;
    
    	return $this;
    }
    
    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
    	return $this->endDate;
    }
    
    /**
     * Add product
     *
     * @param \CS\ProductBundle\Entity\Product $product
     * @return Product
     */
    public function addProduct(\CS\ProductBundle\Entity\Product $product)
    {
    	$this->product[] = $product;
    
    	return $this;
    }
    
    /**
     * Remove product
     *
     * @param \CS\ProductBundle\Entity\Product $product
     */
    public function removeProduct(\CS\ProductBundle\Entity\Product $product)
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
     * Set products
     *
     * @return Promotion
     */
    public function setProducts(\Doctrine\Common\Collections\Collection $products)
    {
    	$this->products = $products;
    	
    	return $this;
    }
    
    /**
     * Set fournisseur
     *
     * @param \CS\UserBundle\Entity\Fournisseur $fournisseur
     * @return Promotion
     */
    public function setFournisseur(\CS\UserBundle\Entity\Fournisseur $fournisseur = null)
    {
    	$this->fournisseur = $fournisseur;
    
    	return $this;
    }
    
    /**
     * Get fournisseur
     *
     * @return \CS\UserBundle\Entity\Fournisseur
     */
    public function getFournisseur()
    {
    	return $this->fournisseur;
    }
    
}