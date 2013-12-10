<?php

namespace CS\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use CS\CartBundle\Entity\Cart;


// (repositoryClass="CS\UserBundle\Repository\UtilisateurRepository")
/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 *
 * 
 */

class Utilisateur extends BaseUser implements Taggable{
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
	 * @var string
	 *
	 * @ORM\Column(type="string", length=300, nullable=true)
	 */
	private $photo;
	
	/**
	 * @var Cart
	 * 
	 * @ORM\OneToOne(targetEntity="CS\CartBundle\Entity\Cart",cascade={"persist"})
	 * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
	 */
	private $cart;

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
	
	/**
	 * Set photo url
	 *
	 * @param string $photo
	 * @return Utilisateur
	 */
	public function setPhoto($photo)
	{
		$this->photo = $photo;
	
		return $this;
	}
	
	/**
	 * Get photo
	 *
	 * @return string
	 */
	public function getPhoto()
	{
		return $this->photo;
	}
	
	public function setEmail($email)
	{
		parent::setEmail($email);
		$this->setUsername($email);
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
}
