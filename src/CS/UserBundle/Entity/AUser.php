<?php

namespace CS\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="auser")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"utilisateur" = "CS\UserBundle\Entity\Utilisateur", 
 *                        "admin" = "CS\UserBundle\Entity\Administrateur" , 
 *                        "fournisseur" = "CS\UserBundle\Entity\Fournisseur"})
 *
 */
abstract class AUser extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	
	public function setEmail($email)
	{
		parent::setEmail($email);
		$this->setUsername($email);
	}
}