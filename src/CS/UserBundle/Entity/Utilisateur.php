<?php

namespace CS\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use CS\CartBundle\Entity\Cart;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;


// (repositoryClass="CS\UserBundle\Repository\UtilisateurRepository")
/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 * @UniqueEntity(fields = "username", targetClass = "CS\UserBundle\Entity\AUser", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "CS\UserBundle\Entity\AUser", message="fos_user.email.already_used")
 */

class Utilisateur extends AUser implements Taggable{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=30, nullable=false)
	 */
	private $nom;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=30, nullable=false)
	 */
	private $prenom;

	/**
	 * @var Cart
	 * 
	 * @ORM\OneToOne(targetEntity="CS\CartBundle\Entity\Cart",cascade={"persist"})
	 * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
	 */
	private $cart;
	
	/**
	 * @var bool
	 *
	 * @ORM\Column(type="boolean")
	 */
	private $optin_donnee;
	
	/**
	 * @var bool
	 *
	 * @ORM\Column(type="boolean")
	 */
	private $optin_newsletter;

	/**
	 * Set nom
	 *
	 * @param string $nom
	 * @return Utilisateur
	 */
	public function setNom($nom) {
		$this->nom = $nom;

		return $this;
	}

	/**
	 * Get nom
	 *
	 * @return string
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * Set prenom
	 *
	 * @param string $prenom
	 * @return Utilisateur
	 */
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	
		return $this;
	}
	
	/**
	 * Get cart
	 *
	 * @return Cart
	 */
	public function getCart()
	{
		return $this->cart;
	}
	
	/**
	 * Set cart
	 *
	 * @param  Cart $cart
	 * @return Utilisateur
	 */
	public function setCart($cart)
	{
		$this->cart = $cart;
	
		return $this;
	}
	
	/**
	 * Get prenom
	 *
	 * @return string
	 */
	public function getPrenom()
	{
		return $this->prenom;
	}
	
	
	
	public function __construct() {
		parent::__construct();
		$this->roles = array('ROLE_CLIENT');
	}
	

	//Gestion des communautes par syst�me de tag
	
	protected $communities;
	
	public function getTaggableType()
	{
		return 'user';
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
     * Set optin_donnee
     *
     * @param boolean $optinDonnee
     * @return Utilisateur
     */
    public function setOptinDonnee($optinDonnee)
    {
        $this->optin_donnee = $optinDonnee;
    
        return $this;
    }

    /**
     * Get optin_donnee
     *
     * @return boolean 
     */
    public function getOptinDonnee()
    {
        return $this->optin_donnee;
    }

    /**
     * Set optin_newsletter
     *
     * @param boolean $optinNewsletter
     * @return Utilisateur
     */
    public function setOptinNewsletter($optinNewsletter)
    {
        $this->optin_newsletter = $optinNewsletter;
    
        return $this;
    }

    /**
     * Get optin_newsletter
     *
     * @return boolean 
     */
    public function getOptinNewsletter()
    {
        return $this->optin_newsletter;
    }
}