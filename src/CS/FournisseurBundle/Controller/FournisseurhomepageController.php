<?php

namespace CS\FournisseurBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FournisseurhomepageController extends Controller {
	public function fournisseurhomepageAction() {
		$user = $this->get('security.context')->getToken()->getUser();
		return $this
				->render('CSFournisseurBundle:Homepage:homepageFournisseur.html.twig', array('user'=>$user));
	}
}
