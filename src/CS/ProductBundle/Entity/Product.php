<?php
namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Bundle\ProductBundle\Model\Product as BaseProduct;


/**
 * CS\ProductBundle\Entity\Product
 * 
 * @ORM\Entity
 */
class Product  extends BaseProduct implements Taggable
{
	protected $communities;

	public function getId()
	{
		return $this->id;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($title)
	{
		return $this->title = $title;
	}

	public function getTaggableType()
	{
		return 'product';
	}

	public function getTaggableId()
	{
		return $this->getId();
	}

	public function getTags()
	{
		$this->communities = $this->communities ?: new ArrayCollection();
		return $this->communities;
	}
	
	public function removeTag($tag)
	{
		$this->communities = $this->communities ?: new ArrayCollection();
	
		$this->communities->removeElement($tag);
	
	}
	
	public function setTags($tags) {
		$this->communities->clear();
		foreach($tags as $tag) {
			$this->communities->add($tag);
		}
	}
	
	public function addTag($tag)
	{
		$this->communities = $this->communities ?: new ArrayCollection();
		if(!$this->communities->contains($tag)){
			$this->communities->add($tag);
		}
	}
	
	public function getPrice(){
		foreach ($this->getProperties() as $property){
			if($property->getName() == "price") return intval($property->getValue());
		}
	}
}