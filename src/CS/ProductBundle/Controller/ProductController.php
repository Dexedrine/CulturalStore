<?php

namespace CS\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use CS\ProductBundle\Entity\Book;
use CS\ProductBundle\Entity\Game;
use CS\ProductBundle\Entity\Music;
use CS\ProductBundle\Entity\Ticket;
use CS\ProductBundle\Entity\Video;
use CS\ProductBundle\Entity\InfoTracking;
use CS\ProductBundle\Form\Type\BookType;
use CS\ProductBundle\Form\Type\GameType;
use CS\ProductBundle\Form\Type\MusicType;
use CS\ProductBundle\Form\Type\TicketType;
use CS\ProductBundle\Form\Type\VideoType;

class ProductController extends Controller
{
	
	public function indexAction(Request $request){
		
		$repository = $this->getDoctrine()->getRepository('CSProductBundle:Product');
		
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		
		$productPaginator = $repository->createPaginator($four);
		
		$productPaginator
			->setCurrentPage($request->get('page', 1), true, true)
			->setMaxPerPage(15);
		
		return $this->render('CSProductBundle:Product:index.html.twig',
					array("resources" => $productPaginator,
						"products" => $productPaginator->getCurrentPageResults()));
		
	}

	public function createVideoAction(Request $request)
	{
		$entityManager = $this->getDoctrine()->getManager();
		
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		
		$product = new Video();
		
		$form = $this->createForm(new VideoType(), $product);
		
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			
			$theme = $this->getDoctrine()
			->getRepository('CSCommunityBundle:Theme')
			->findOneByTitle('Cinema');
			$product->setFournisseur($four);
			$product->setTheme($theme);
			
			$product->upload();
			
			$entityManager->persist($product);
			$entityManager->flush(); // Save changes in database.
			
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}
		
        return $this->showForm($form,'video');
	}
	
	public function createMusicAction(Request $request)
	{
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		
		$entityManager = $this->getDoctrine()->getManager();
		
		
		$product =$product = new Music();
		
		$form = $this->createForm(new MusicType(), $product);

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {

			$theme = $this->getDoctrine()
			->getRepository('CSCommunityBundle:Theme')
			->findOneByTitle('Musique');
				
			$product->setTheme($theme);
			$product->setFournisseur($four);
			$product->upload();

			$entityManager->persist($product);
			$entityManager->flush(); // Save changes in database.
			
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}

		
		return $this->showForm($form,'music');
	}

	public function createBookAction(Request $request)
	{			
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		$entityManager = $this->getDoctrine()->getManager();
		$product = $product = new Book();
		
		$form = $this->createForm(new BookType(), $product);

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			
			$theme = $this->getDoctrine()
			->getRepository('CSCommunityBundle:Theme')
			->findOneByTitle('Livres');
				
			$product->setTheme($theme);
			$product->setFournisseur($four);
			$product->upload();

			$entityManager->persist($product);
			$entityManager->flush(); // Save changes in database.
			
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}
		
		
		return $this->showForm($form,'book');
	}
	
	public function createGameAction(Request $request)
	{
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		$entityManager = $this->getDoctrine()->getManager();
		$product = $product = new Game();
		
		$form = $this->createForm(new GameType(), $product);
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$theme = $this->getDoctrine()
			->getRepository('CSCommunityBundle:Theme')
			->findOneByTitle('Jeux videos');
				
			$product->setTheme($theme);
			$product->setFournisseur($four);
			$product->upload();
	
			$entityManager->persist($product);
			$entityManager->flush(); // Save changes in database.
				
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}
	
		
		return $this->showForm($form,'game');
	}
	
	public function createTicketAction(Request $request)
	{
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		$entityManager = $this->getDoctrine()->getManager();
		$product =$product = new Ticket();
		
		$form = $this->createForm(new TicketType(), $product);
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			
			$theme = $this->getDoctrine()
			->getRepository('CSCommunityBundle:Theme')
			->findOneByTitle('Spectacles');
			
			$product->setTheme($theme);
			$product->setFournisseur($four);
			
			$product->upload();
	
			$entityManager->persist($product);
			$entityManager->flush(); // Save changes in database.
				
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}
	
		
		return $this->showForm($form,'ticket');
	}

	function showCreatedProduct($product,$price, $image){
		$security = $this->get('security.context');
		$four = $security->getToken()->getUser();
		return $this->render('CSProductBundle:Product:show.html.twig'
				,array('product' => $product,
						'price' => $price, 
						'image' => $image,
						'userConnecte' => $four));
	}
	
	function showProductAction($id){
		$security = $this->get('security.context');
		$userConnecte = $security->getToken()->getUser();
		$product = $this->getDoctrine()
			->getRepository('CSProductBundle:Product')
			->findOneById(intval($id));
		$price = $product->getPrice();
		$image = $product->getImage();
		
		$em = $this->getDoctrine()->getEntityManager();
		if( ! $security->isGranted("ROLE_FOURNISSEUR") ){
			if( ! $product->getInfoTracking() ){
				$product->setInfoTracking(new InfoTracking());
			} 
			$product->addVisite();
		}
		$em->flush();
		
		return $this->render('CSProductBundle:Product:show.html.twig'
				,array('product' => $product,
						'price' => $price, 
						'image' => $image,
						'userConnecte' => $userConnecte));

	}

	function showForm($form,$type){
		
		return $this->render('CSProductBundle:Product:create.html.twig'
				,array('form' => $form->createView(), 'type' => $type ));
		
	}
	
	public function downloadAction($product_id)
	{
		$em = $this->getDoctrine()->getEntityManager();
	
		$product = $em->getRepository('CSProductBundle:Product')->findOneById($product_id);
	
		if (!$product) {
			throw $this->createNotFoundException('Unable to find the product');
		}
	
		$headers = array(
				'Content-Type' => $product->getMimeType(),
				'Content-Disposition' => 'attachment; filename="'.$product->getPath().'"'
		);
	
		$filename = $product->getUploadRootDir().'/'.$product->getPath();
	
		return new Response(file_get_contents($filename), 200, $headers);
	}
}
