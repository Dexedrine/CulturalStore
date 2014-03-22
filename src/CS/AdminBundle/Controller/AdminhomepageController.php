<?php

namespace CS\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class AdminhomepageController extends Controller {
	public function adminhomepageAction() {
		$user = $this->get('security.context')->getToken()->getUser();
		
		$repository = $this->getDoctrine()->getRepository('CSUserBundle:Fournisseur');
		$fournisseurs = $repository->findBy(array('enabled' => false));
		
		$repository = $this->getDoctrine()->getRepository('CSProductBundle:Product');
		 
		$products = $repository->findAll();
		 
		$nbCommunityToValidate = 0 ;
		
		foreach ($products as $product){
			$nbCommunityToValidate += $product->getProposedCommunities()->count() 	;	
		}
		
		return $this
				->render('CSAdminBundle:Homepage:homepageAdmin.html.twig', 
							array('user'=>$user ,
								  'nombre_fournisseur'=> sizeof($fournisseurs),
								'nombre_communaute' => $nbCommunityToValidate));
	}
	
	public function showFournisseursAValiderAction(){
		$repository = $this->getDoctrine()->getRepository('CSUserBundle:Fournisseur');
		$fournisseurs = $repository->findBy(array('enabled' => false));
		
		return $this
			->render('CSAdminBundle:Validate:validateFournisseur.html.twig', array('fournisseurs'=>$fournisseurs));		
	}
	
	public function validateFournisseurAction($id_fournisseur){
		$em = $this->getDoctrine()->getManager();
		$repository = $this->getDoctrine()->getRepository('CSUserBundle:Fournisseur');
		$fournisseur = $repository->findOneById($id_fournisseur);
		
		$fournisseur->setEnabled(true);
		$em->flush();		
		return $this->redirect($this->generateUrl('cs_admin_show_fournisseur'));
		
	}
	
	public function showCommunityAValiderAction(){
		$repository = $this->getDoctrine()->getRepository('CSCommunityBundle:Community');
		$communities = $repository->findBy(array('enabled' => false));
		
		
		return $this
		->render('CSAdminBundle:Validate:validateCommunity.html.twig', array('communities'=>$communities));
	}
	
	public function validateCommunityAction($id_community){
		$em = $this->getDoctrine()->getManager();
		/*$repository = $this->getDoctrine()->getRepository('CSCommunityBundle:Community');
		$community = $repository->findOneById($id_community);
	
		$community->setEnabled(true);
		$em->flush();*/
	
		return $this
		->render('CSAdminBundle:Validate:validateFournisseur.html.twig', array('fournisseurs'=>$fournisseurs));
	}
}
