<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CS\ProductBundle\Entity\Comment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Comment{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * Comment text.
	 *
	 * @var string
	 * @ORM\Column(name="text", type="string")
	 */
	protected $text ;
	
	/**
	 * Comment note.
	 *
	 * @var int
	 * @ORM\Column(name="note", type="integer")
	 */
	protected $note;
	
	/**
	 * Comment product
	 * 
	 *  @ORM\ManyToOne(targetEntity="CS\ProductBundle\Entity\Product")
	 *  @ORM\JoinColumn(name="product_id", referencedColumnName="id")
	 */
	protected $product;
	
	/**
	 * Creation time.
	 *
	 * @var \DateTime
	 * @ORM\Column(name="createdAt", type="datetime")
	 */
	protected $createdAt;
	
	
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->createdAt = new \DateTime ();
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
     * Set text
     *
     * @param string $text
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;
    
        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set note
     *
     * @param int $note
     * @return Comment
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
    	$this->createdAt = $createdAt;
    
    	return $this;
    }
    
    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
    	return $this->createdAt;
    }
}