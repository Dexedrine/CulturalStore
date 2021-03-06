<?php

namespace CS\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

// (repositoryClass="CS\UserBundle\Repository\UtilisateurRepository")
/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="fournisseur")
 * @UniqueEntity(fields = "username", targetClass = "CS\UserBundle\Entity\AUser", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "CS\UserBundle\Entity\AUser", message="fos_user.email.already_used")
 */

class Fournisseur extends AUser {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=50, nullable=false)
	 */
	protected $nom;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=100, nullable=false)
	 */
	protected $adresse;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=10, nullable=false)
	 */
	protected $codepostal;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=50, nullable=false)
	 */
	protected $ville;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=14, nullable=false)
	 */
	protected $siret;
	
	/**
	 *
	 *  @var \Doctrine\Common\Collections\Collection 
	 *
	 * @ORM\OneToMany(targetEntity="CS\ProductBundle\Entity\Product", mappedBy="fournisseur")
	 */
	private $products;
	
	
	/**
	 *
	 *  @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\OneToMany(targetEntity="CS\ProductBundle\Entity\Promotion", mappedBy="fournisseur")
	 */
	private $promotions;

	/**
	 * @ORM\PrePersist
	 */
	public function setEnabledFalse() {
		$this->enabled = false;
	}

	public function __construct() {
		parent::__construct();
		$this->roles = array('ROLE_FOURNISSEUR');
	}

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set nom
	 *
	 * @param string $nom
	 * @return Fournisseur
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
	 * Set adresse
	 *
	 * @param string $adresse
	 * @return Fournisseur
	 */
	public function setAdresse($adresse) {
		$this->adresse = $adresse;

		return $this;
	}

	/**
	 * Get adresse
	 *
	 * @return string 
	 */
	public function getAdresse() {
		return $this->adresse;
	}

	/**
	 * Set codepostal
	 *
	 * @param string $codepostal
	 * @return Fournisseur
	 */
	public function setCodepostal($codepostal) {
		$this->codepostal = $codepostal;

		return $this;
	}

	/**
	 * Get codepostal
	 *
	 * @return string 
	 */
	public function getCodepostal() {
		return $this->codepostal;
	}

	/**
	 * Set ville
	 *
	 * @param string $ville
	 * @return Fournisseur
	 */
	public function setVille($ville) {
		$this->ville = $ville;

		return $this;
	}

	/**
	 * Get ville
	 *
	 * @return string 
	 */
	public function getVille() {
		return $this->ville;
	}

	/**
	 * Set siret
	 *
	 * @param string $siret
	 * @return Fournisseur
	 */
	public function setSiret($siret) {
		$this->siret = $siret;

		return $this;
	}

	/**
	 * Get siret
	 *
	 * @return string 
	 */
	public function getSiret() {
		return $this->siret;
	}
	
	/**
	 * Add product
	 *
	 * @param \CS\ProductBundle\Entity\Product $product
	 * @return Fournisseur
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
	 * Add promotion
	 *
	 * @param \CS\ProductBundle\Entity\Promotion $promotion
	 * @return Fournisseur
	 */
	public function addPromotion(\CS\ProductBundle\Entity\Promotion $promotion)
	{
		$this->promotions[] = $promotion;
	
		return $this;
	}
	
	/**
	 * Remove promotion
	 *
	 * @param \CS\ProductBundle\Entity\Product $promotion
	 */
	public function removePromotion(\CS\ProductBundle\Entity\Promotion $promotion)
	{
		$this->promotions->removeElement($promotion);
	}
	
	/**
	 * Get promotion
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getPromotions()
	{
		return $this->promotions;
	}
}
