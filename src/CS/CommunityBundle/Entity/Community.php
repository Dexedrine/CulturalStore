<?php
namespace CS\CommunityBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * CS\CommunityBundle\Entity\Community
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Community 
{
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\OneToMany(targetEntity="CommunitySubscribing", mappedBy="community", fetch="EAGER")
	 **/
	protected $community_subscribing;
}