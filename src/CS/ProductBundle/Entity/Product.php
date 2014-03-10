<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Bundle\ProductBundle\Model\Product as BaseProduct;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CS\ProductBundle\Entity\Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CS\ProductBundle\Repository\ProductPaginator")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="product_type", type="string")
 * @ORM\DiscriminatorMap({"book" = "CS\ProductBundle\Entity\Book",
 * 							"game" = "CS\ProductBundle\Entity\Game",
 *   						"video" = "CS\ProductBundle\Entity\Video",
 *   						"music" = "CS\ProductBundle\Entity\Music",
 * 							"ticket" = "CS\ProductBundle\Entity\Ticket",
 * })
 */
class Product implements Taggable {
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	protected $id;
	
	/**
	 * Product name.
	 *
	 * @var string
	 * @ORM\Column(name="title", type="string")
	 */
	protected $name;
	

	public $product_type;
	
	/**
	 * Product description.
	 *
	 * @var string
	 *  @ORM\Column(name="description",type="text")
	 */
	protected $description;
	
	/**
	 * Product price.
	 *
	 * @var int
	 *  @ORM\Column(name="price", type="integer")
	 */
	protected $price;
	
	/**
	 * Product genre.
	 *
	 * @var string
	 * @ORM\Column(name="genre", type="string")
	 * 
	 */
	protected $genre;
	
		
	/**
	 * Product image.
	 *
	 * @var string
	 * @ORM\Column(name="image", type="string")
	 *
	 */
	protected $image;
	
	/**
	 * Creation time.
	 *
	 * @var \DateTime
	 * @ORM\Column(name="createdAt", type="datetime")
	 */
	protected $createdAt;
	
	/**
	 *
	 * @var CS\CommunityBundle\Entity\Theme
	 *
	 * @ORM\ManyToOne(targetEntity="CS\CommunityBundle\Entity\Theme")
	 * @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
	 */
	private $theme;
	
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->createdAt = new \DateTime ();
	}
	
	/**
	 * @Assert\File()
	 */
	public $file;
	
	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	public $path;
	
	public function getAbsolutePath() {
		return null === $this->path ? null : $this->getUploadRootDir () . '/' . $this->path;
	}
	public function getWebPath() {
		return null === $this->path ? null : $this->getUploadDir () . '/' . $this->path;
	}
	protected function getUploadRootDir() {
		// le chemin absolu du r�pertoire o� les documents upload�s doivent �tre sauvegard�s
		return __DIR__ . '/../../../../tmp/' . $this->getUploadDir ();
	}
	protected function getUploadDir() {
		// on se d�barrasse de � __DIR__ � afin de ne pas avoir de probl�me lorsqu'on affiche
		// le document/image dans la vue.
		return 'uploads/documents';
	}
	protected $communities;
	public function getCommunities() {
		return $this->getTags ();
	}
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		return $this->title = $title;
	}
	public function getTaggableType() {
		return 'product';
	}
	public function getTaggableId() {
		return $this->getId ();
	}
	public function getTags() {
		$this->communities = $this->communities ?  : new ArrayCollection ();
		return $this->communities;
	}
	public function removeTag($tag) {
		$this->communities = $this->communities ?  : new ArrayCollection ();
		
		$this->communities->removeElement ( $tag );
	}
	public function setTags($tags) {
		$this->communities->clear ();
		foreach ( $tags as $tag ) {
			$this->communities->add ( $tag );
		}
	}
	public function addTag($tag) {
		$this->communities = $this->communities ?  : new ArrayCollection ();
		if (! $this->communities->contains ( $tag )) {
			$this->communities->add ( $tag );
		}
	}
	public function getPrice() {
		return $this->price;
	}
	public function upload() {
		if (null === $this->file) {
			return;
		}
		
		$this->file->move ( $this->getUploadRootDir (), $this->file->getClientOriginalName () );
		
		$this->path = $this->file->getClientOriginalName ();
		
		$this->file = null;
	}
	public function setFile($file) {
		return $this->file = $file;
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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param \number $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Product
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    
        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }
    
    
   
    
    
    /**
     * Set image
     *
     * @param string $image
     * @return Product
     */
    public function setImage($image)
    {
    	$this->image = $image;
    
    	return $this;
    }
    
    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
    	return $this->image;
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

    /**
     * Set path
     *
     * @param string $path
     * @return Product
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set theme
     *
     * @param \CS\CommunityBundle\Entity\Theme $theme
     * @return Product
     */
    public function setTheme(\CS\CommunityBundle\Entity\Theme $theme = null)
    {
        $this->theme = $theme;
    
        return $this;
    }

    /**
     * Get theme
     *
     * @return \CS\CommunityBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->theme;
    }
    
    public function getProperties()
    {
    	return null;
    }
     public function getMetaKeywords()
    {
    	return null;
    }
}