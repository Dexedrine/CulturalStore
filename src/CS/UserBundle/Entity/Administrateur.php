<?php

namespace CS\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;


// (repositoryClass="CS\UserBundle\Repository\UtilisateurRepository")
/**
 * @ORM\Entity
 * @ORM\Table(name="administrateur")
 * @UniqueEntity(fields = "username", targetClass = "CS\UserBundle\Entity\AUser", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "CS\UserBundle\Entity\AUser", message="fos_user.email.already_used")
 */

class Administrateur extends AUser{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	public function __construct() {
		parent::__construct();
		$this->roles = array('ROLE_ADMIN');
	}
	
}
