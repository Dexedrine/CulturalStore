<?php
namespace CS\CommunityBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use FPN\TagBundle\Entity\Tagging  as BaseTagging;

/**
 * CS\CommunityBundle\Entity\CommunitySubscribing
 *
 * @ORM\Table(uniqueConstraints={@UniqueConstraint(name="tagging_idx", columns={"tag_id", "resource_type", "resource_id"})})
 * @ORM\Entity
 */
class CommunitySubscribing extends BaseTagging
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
     * @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     **/
    protected $tag;
    
    public function getCommunity(){
    	return $tag;
    }
}