<?php

namespace CS\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class AdminhomepageController extends Controller {
	public function adminhomepageAction() {
		$user = $this->get('security.context')->getToken()->getUser();
		return $this
				->render('CSAdminBundle:Homepage:homepageAdmin.html.twig', array('user'=>$user));
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
	
	public function validateCommunityAction($id_fournisseur){
		$em = $this->getDoctrine()->getManager();
		/*$repository = $this->getDoctrine()->getRepository('CSUserBundle:Fournisseur');
		$community = $repository->findOneById($id_fournisseur);
	
		$fournisseur->setEnabled(true);
		$em->flush();*/
	
		return $this
		->render('CSAdminBundle:Validate:validateFournisseur.html.twig', array('fournisseurs'=>$fournisseurs));
	}
}
