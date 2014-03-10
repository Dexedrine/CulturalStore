<?php

namespace CS\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller {
	public function searchAction(Request $request) {
		$form = $this->createFormBuilder ()->add ( 'recherche', 'text', array (
				'attr' => array (
						'class' => "search-query",
						'placeholder' => "Twilight, Lara Fabian, etc." 
				) 
		) )->add ( 'Rechercher', 'submit', array (
				'attr' => array (
						'class' => "btn btn-primary search" 
				) 
		) )->getForm ();
		
		// $form->handleRequest($request);
		
		if ($request->isMethod ( 'POST' )) {
			$form->bind ( $request );
			if ($form->isValid ()) {
				// recupere les resultats de la recherche
				// $repositoryManager = $this->container->get('fos_elastica.manager');
				// $repository = $repositoryManager
				// ->getRepository('CSProductBundle:Product');
				// $products = $repository
				// ->find($form["recherche"]->getData());
				$finder = $this->container->get ( 'fos_elastica.finder.website.product' );
				$products = $finder->find ( $form ["recherche"]->getData () );
				return $this->render ( 'CSProductBundle:Product:search_result.html.twig', array (
						'products' => $products,
						'recherche' => $form ["recherche"]->getData () 
				) );
			}
		}
		return $this->render ( 'CSProductBundle:Product:search.html.twig', array (
				'form' => $form->createView () 
		) );
		// pour l'autocompletion = http://devblog.lexik.fr/symfony2/autocompletion-avec-elasticsearch-2525
	}
	
	function showProductAction($id) {
		$product = $this->getDoctrine()
			->getRepository('CSProductBundle:Product')
			->findOneById(intval($id));
		$price = intval ( $product->getPrice()->__toString () ) / 100;
		$image = $product->getPrice ();
		
		return $this->render('CSProductBundle:Product:show.html.twig'
				,array('product' => $product,'price' => $price, 'image' => $image));
	}
	
	public function searchByTypeAction($type) {
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByType' );
		$query = new \Elastica\Query(array(
				// query filter
				'query' => array(
						'query_string' => array(
								'query' => $type
						)
				),
				// default sort
				'sort' => array(
						'name' => array(
								'order' => 'asc'
						)
				)
		));	
		$products = $finder->find ( $query );  
		return $this->render ( 'CSProductBundle:Product:search_result_carousel.html.twig', array (
				'products1' => array_slice($products, 0, 3),
				'products2' => array_slice($products, 3, 6),
				'type' =>$type
		) );
	}
	public function searchFreeAction() {
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByPrice' );
		$products = $finder->find ( '=0' );
		return $this->render ( 'CSProductBundle:Product:search_result_carousel.html.twig', array (
				'products1' => array_slice($products, 0, 3),
				'products2' => array_slice($products, 3, 6),
				'type' =>'free'
		) );
	}
	public function searchNotFreeAction() {
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByPrice' );
		$query = new \Elastica\Query(array(
				// query filter
				'query' => array(
						'query_string' => array(
								'query' => '>0'
						)
				),
				// default sort
				'sort' => array(
						'price' => array(
								'order' => 'asc'
						)
				)
		));

		$products = $finder->find ( $query );
		return $this->render ( 'CSProductBundle:Product:search_result_carousel.html.twig', array (
				'products1' => array_slice($products, 0, 3),
				'products2' => array_slice($products, 3, 6),
				'type' =>'notfree'
		) );
	}
	
	public function showByTypeAction($type) {
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByType' );
		$products = $finder->find ( $type );
		return $this->render ( 'CSProductBundle:Product:search_result.html.twig', array (
				'products' => $products
		) );
	}
}
