<?php
namespace CS\CommunityBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use FPN\TagBundle\Entity\Tag  as BaseTag;


/**
 * CS\CommunityBundle\Entity\Community
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Community extends BaseTag
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
     * @ORM\OneToMany(targetEntity="CommunitySubscribing", mappedBy="tag", fetch="EAGER")
     **/
    protected $tagging;
}