<?php

namespace CS\DesignBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class HomepageController extends Controller {
	public function homepageAction() {
		$security = $this->get('security.context');
		$user = $security->getToken()->getUser();
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByType' );
		foreach( $finder->find ( '*' ) as $product ){

			$tagManager = $this->get('fpn_tag.tag_manager');
			$entityManager = $this->getDoctrine()->getManager();
			$tagRepo = $entityManager->getRepository('CS\CommunityBundle\Entity\Community');
			$tagManager->loadTagging($product);
		}
		return $this
				->render('CSDesignBundle:Homepage:homepage.html.twig', array('user'=>$user));
	}
}
