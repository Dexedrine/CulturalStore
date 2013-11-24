<?php

namespace CS\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommunityController extends Controller
{
	
	public function homeAction()
	{		 
		return $this->render('CSCommunityBundle:Community:communityHome.html.twig');
	}
	
    public function createAction($name)
    {
    	$tagManager = $this->get('fpn_tag.tag_manager');
    	
    	// ask the tag manager to create a Tag object
    	$fooTag = $tagManager->loadOrCreateTag('foo');
    	
        return $this->render('CSCommunityBundle:Default:index.html.twig', array('name' => $name));
    }
}
