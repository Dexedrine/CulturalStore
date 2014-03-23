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
						'score' => array(
								'order' => 'desc'
						)
				)
		));	
		$products = $finder->find ( $query );  
		return $this->render ( 'CSProductBundle:Product:search_result_carousel.html.twig', array (
				'products1' => array_slice($products, 0, 3),
				'products2' => array_slice($products, 3, 3),
				'type' =>$type
		) );
	}
	public function searchByCommunityAction($community) {
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByCommunity' );
		$query = new \Elastica\Query(array(
				// query filter
				'query' => array(
						'query_string' => array(
								'query' => strtok($community,' ')
						)
				),
				// default sort
				'sort' => array(
						'score' => array(
								'order' => 'desc'
						)
				)
		));
		$products = $finder->find ( $query );
		return $this->render ( 'CSProductBundle:Product:search_result_carousel.html.twig', array (
				'products1' => array_slice($products, 0, 3),
				'products2' => array_slice($products, 3, 3),
				'type' =>$community
		) );
	}
	public function searchByCommunityWithoutCarouselAction($community) {
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByCommunity' );
		$query = new \Elastica\Query(array(
				// query filter
				'query' => array(
						'query_string' => array(
								'query' => strtok($community,' ')
						)
				),
				// default sort
				'sort' => array(
						'score' => array(
								'order' => 'desc'
						)
				)
		));
		$products = $finder->find ( $query );
		return $this->render ( 'CSProductBundle:Product:search_result_without_carousel.html.twig', array (
				'products' => $products
		) );
	}
	
	public function searchFreeAction() {
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByPrice' );
		$query = new \Elastica\Query(array(
				// query filter
				'query' => array(
						'query_string' => array(
								'query' => 'price:=0'
						)
				),
				// default sort
				'sort' => array(
						'score' => array(
								'order' => 'desc'
						)
				)
		));

		$products = $finder->find ( $query );
		return $this->render ( 'CSProductBundle:Product:search_result_carousel.html.twig', array (
				'products1' => array_slice($products, 0, 3),
				'products2' => array_slice($products, 3, 3),
				'type' =>'free'
		) );
	}
	public function searchNotFreeAction() {
		$finder = $this->container->get ( 'fos_elastica.finder.website.productByPrice' );
		$query = new \Elastica\Query(array(
				// query filter
				'query' => array(
						'query_string' => array(
								'query' => 'price:>0'
						)
				),
				// default sort
				'sort' => array(
						'score' => array(
								'order' => 'desc'
						)
				)
		));

		$products = $finder->find ( $query );
		return $this->render ( 'CSProductBundle:Product:search_result_carousel.html.twig', array (
				'products1' => array_slice($products, 0, 3),
				'products2' => array_slice($products, 3, 3),
				'type' =>'notfree'
		) );
	}
	public function top3ThemeAction() {
		$finder = $this->container->get ( 'fos_elastica.finder.website.theme' );
		$query = new \Elastica\Query(array(
				// query filter
				'query' => array(
						'query_string' => array(
								'query' => '*'
						)
				),
				// default sort
				'sort' => array(
						'score' => array(
								'order' => 'desc', 
								'mode' => 'avg'
						)
				)
		));
	
		$theme = $finder->find ( $query );
		return $this->render ( 'CSProductBundle:Product:showTop3Theme.html.twig', array (
				'themes' => array_slice($theme, 0, 3)
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
