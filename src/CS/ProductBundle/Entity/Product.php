<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;

/**
 * CS\ProductBundle\Entity\Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CS\ProductBundle\Repository\ProductPaginator")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="productType", type="string")
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
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\OneToMany(targetEntity="CS\ProductBundle\Entity\Comment", mappedBy="product")
	 */
	private $comments;
	
	/**
	 *
	 * @var CS\CommunityBundle\Entity\Theme
	 *
	 * @ORM\ManyToOne(targetEntity="CS\CommunityBundle\Entity\Theme")
	 * @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
	 */
	private $theme;
	
	
	/**
	 *
	 * @var CS\UserBundle\Entity\Fournisseur
	 *
	 * @ORM\ManyToOne(targetEntity="CS\UserBundle\Entity\Fournisseur")
	 * @ORM\JoinColumn(name="fournissuer_id", referencedColumnName="id")
	 */
	private $fournisseur;
	
	/**
	 *
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="CS\ProductBundle\Entity\Promotion", inversedBy="products")
	 *      @ORM\JoinTable(name="product_promotion",
	 *      joinColumns={
	 *      @ORM\JoinColumn(name="product_id", referencedColumnName="id")
	 *      },
	 *      inverseJoinColumns={
	 *      @ORM\JoinColumn(name="promotion_id", referencedColumnName="id")
	 *      }
	 *      )
	 */
	private $promotions;
	
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->createdAt = new \DateTime ();
		$this->communities = new ArrayCollection();
		$this->comments = new ArrayCollection();
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
	
	/**
	 *
	 * @var \Doctrine\Common\Collections\Collection
	 *  @ORM\ManyToMany(targetEntity="CS\CommunityBundle\Entity\Community")
	 *      @ORM\JoinTable(name="community_product",
	 *      joinColumns={
	 *      @ORM\JoinColumn(name="product_id", referencedColumnName="id")
	 *      },
	 *      inverseJoinColumns={
	 *      @ORM\JoinColumn(name="community_id", referencedColumnName="id")
	 *      }
	 *      )
	 */
	public $communities;
	/**
	 * Product score.
	 *
	 * @var int
	 *  @ORM\Column(name="score", type="float", options={"default" = 0.75})
	 */
	public $score = 0.75 ;
	
	protected  $tags;

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
		$this->tags = $this->tags ?  : new ArrayCollection ();
		return $this->tags;
	}
	public function removeTag($tag) {
		$this->tags = $this->tags ?  : new ArrayCollection ();
		
		$this->tags->removeElement ( $tag );
	}
	public function setTags($tags) {
		$this->tags->clear ();
		foreach ( $tags as $tag ) {
			$this->tags->add ( $tag );
		}
	}
	public function addTag($tag) {
		$this->tags = $this->tags ?  : new ArrayCollection ();
		if (! $this->tags->contains ( $tag )) {
			$this->tags->add ( $tag );
		}
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
	
	public function hasPromotionOnSameDate($managedPromotion){
		$datedebut= $managedPromotion->getBeginDate()->format('d/m/Y');
		$datefin= $managedPromotion->getEndDate()->format('d/m/Y');
			
		$ddebut = explode("/", $datedebut);
		$dfin = explode("/", $datefin);
			
		$debutmanagedpro = $ddebut[2].$ddebut[1].$ddebut[0];
		$finmanagedpro = $dfin[2].$dfin[1].$dfin[0];
		
		foreach ($this->promotions as $promotion) { 
			
			$datedebut= $promotion->getBeginDate()->format('d/m/Y');
			$datefin= $promotion->getEndDate()->format('d/m/Y');
				
			$ddebut = explode("/", $datedebut);
			$dfin = explode("/", $datefin);
				
			$debutpro = $ddebut[2].$ddebut[1].$ddebut[0];
			$finpro = $dfin[2].$dfin[1].$dfin[0];
			if ($debutmanagedpro >= $debutpro  && $debutmanagedpro <= $finpro
				|| $finmanagedpro >= $debutpro  && $finmanagedpro <= $finpro
				|| $debutpro >= $debutmanagedpro  && $debutpro <= $finmanagedpro
				|| $finpro >= $debutmanagedpro  && $finpro <= $finmanagedpro
)
			{
				return true;
			}
		}
		return false;
	}
	
	public function getCurrentPromotion(){
		foreach ($this->promotions as $promotion) {
			$datejour = date('d/m/Y');
			$datedebut= $promotion->getBeginDate()->format('d/m/Y');
			$datefin= $promotion->getEndDate()->format('d/m/Y');
			
			$ddebut = explode("/", $datedebut);
			$dfin = explode("/", $datefin);
			
			$djour = explode("/", $datejour);
			$debutpro = $ddebut[2].$ddebut[1].$ddebut[0];
			$finpro = $dfin[2].$dfin[1].$dfin[0];
			$auj = $djour[2].$djour[1].$djour[0];

			if ($auj >= $debutpro  && $auj <= $finpro)
			{
				return $promotion;
			}
		}
		return null;
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

    public function getPrice() {
    	return $this->price;
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
    
    public function getScore() {
    	return $this->score;
    }
    
    /**
     * Set score
     *
     * @param \number $score
     * @return Product
     */
    public function setScore($score)
    {
    	$this->score = $score;
    
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
    /**
     * Set fournisseur
     *
     * @param \CS\UserBundle\Entity\Fournisseur $fournisseur
     * @return Product
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
    

    /**
     * Add communities
     *
     * @param \CS\CommunityBundle\Entity\Community $communities
     * @return Product
     */
    public function addCommunity(\CS\CommunityBundle\Entity\Community $communities)
    {
        $this->communities[] = $communities;
    
        return $this;
    }

    /**
     * Remove communities
     *
     * @param \CS\CommunityBundle\Entity\Community $communities
     */
    public function removeCommunity(\CS\CommunityBundle\Entity\Community $communities)
    {
        $this->communities->removeElement($communities);
    }

    /**
     * Get communities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommunities()
    {
        return $this->communities;
    }
    
    public function getProperties()
    {
    	return null;
    }
    public function getMetaKeywords()
    {
    	return null;
    }

    /**
     * Add comments
     *
     * @param \CS\ProductBundle\Entity\Comment $comments
     * @return Product
     */
    public function addComment(\CS\ProductBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \CS\ProductBundle\Entity\Comment $comments
     */
    public function removeComment(\CS\ProductBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
    
    /**
     * Add promotion
     *
     * @param \CS\ProductBundle\Entity\Promotion $promotion
     * @return Product
     */
    public function addPromotion(\CS\ProductBundle\Entity\Promotion $promotion)
    {
    	$this->promotions[] = $promotion;
    
    	return $this;
    }
    
    /**
     * Remove promotion
     *
     * @param \CS\ProductBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\CS\ProductBundle\Entity\Promotion $promotion)
    {
    	$this->promotions->removeElement($promotion);
    }
    
    /**
     * Get promotions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPromotions()
    {
    	return $this->promotions;
    }

}