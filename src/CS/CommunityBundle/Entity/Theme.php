<?php
namespace CS\CommunityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CS\CommunityBundle\Entity\Theme
 * 
 * @ORM\Table()
 * @ORM\Entity
 */
class Theme implements Taggable
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	public $id;

	/**
	 * @ORM\Column(name="title", type="string", length=50)
	 */
	public $title;

	protected $communities;

	public function getId()
	{
		return $this->id;
	}

	public function setTitle($title)
	{
		return $this->title = $title;
	}

	public function getTaggableType()
	{
		return 'theme';
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
	
	public function setTags($tags) {
		$this->communities->clear();
		foreach($tags as $tag) {
			$this->communities->add($tag);
		}
	}
}