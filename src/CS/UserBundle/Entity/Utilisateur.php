<?php

namespace CS\UserBundle\Entity;

use Kunstmaan\TaggingBundle\Entity\Taggable;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;


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
	

	//Gestion des communautés par systéme de tag
	
	protected $communities;
	
	/**
     * Returns the unique taggable resource type
     *
     * @return string
     */
    function getTaggableType()
    {
        return "utilisateur";
    }
	
	/**
     * Returns the unique taggable resource identifier
     *
     * @return string
     */
    function getTaggableId()
    {
        return $this->id;
    }
	
 	/**
     * Returns the collection of tags for this Taggable entity
     *
     * @return Doctrine\Common\Collections\Collection
     */
    function getTags()
    {
        $this->communities = $this->communities ?: new ArrayCollection();
        return $this->communities;
    }

    public function setTags($tags)
    {
        $this->communities = $tags;
    }
	
	
}
