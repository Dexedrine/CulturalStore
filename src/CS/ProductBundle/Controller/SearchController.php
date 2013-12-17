<?php

namespace CS\ProductBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;

class SearchController extends Controller {

	public function searchAction(Request $request) {

		$form = $this->createFormBuilder()->add('recherche', 'text',
					array( 'attr' => array('class' => "search-query", 'placeholder' => "Twilight, Lara Fabian, etc.")))
				->add( 'Rechercher', 'submit',
					array( 'attr' => array('class' => "btn btn-primary search" ))) 
				->getForm();

		//$form->handleRequest($request);

		if ($request->isMethod('POST')) {
			$form->bind($request);
			if ($form->isValid()) {
				//recupere les resultats de la recherche
				$repositoryManager = $this->container->get('fos_elastica.manager');
				$repository = $repositoryManager
						->getRepository('CSProductBundle:Product');
				$products = $repository
						->find($form["recherche"]->getData());
				return $this
						->render(
								'CSProductBundle:Product:search_result.html.twig',
								array('products' => $products,
										'recherche' => $form["recherche"]->getData(),));
	
			}
		}
		return $this
				->render('CSProductBundle:Product:search.html.twig',
						array('form' => $form->createView(),));
		// 		pour l'autocompletion = http://devblog.lexik.fr/symfony2/autocompletion-avec-elasticsearch-2525
	}
}
