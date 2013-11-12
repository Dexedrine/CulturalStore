<?php

namespace CS\UserBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="CS\UserBundle\Repository\UtilisateurRepository")
 * @ORM\HasLifecycleCallbacks
 */

class Utilisateur extends BaseUser {
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
		// your own logic
	}
}