<?php
namespace CS\CommunityBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * CS\CommunityBundle\Entity\CommunitySubscribing
 *
 * @ORM\Table(uniqueConstraints={@UniqueConstraint(name="community_subscribing_idx", columns={"community_id", "resource_type", "resource_id"})})
 * @ORM\Entity
 */
class CommunitySubscribing
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
	 * @ORM\ManyToOne(targetEntity="Community")
	 * @ORM\JoinColumn(name="community_id", referencedColumnName="id")
	 **/
	protected $community;
}