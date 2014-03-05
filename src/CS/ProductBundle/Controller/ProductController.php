<?php

namespace CS\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;

class ProductController extends ResourceController
{
	protected $repository;
	protected $manager;
	protected $propertyRepository;
	protected $productPropertyRepository;

	private function prepareRepository(){
		$this->repository = $this->container->get('sylius.repository.product');
		$this->manager = $this->container->get('sylius.manager.product'); // Alias for appropriate doctrine manager service.
		$this->propertyRepository = $this->container->get('sylius.repository.property');
		$this->productPropertyRepository = $this->container->get('sylius.repository.product_property');
	}

	private function addProperty($product, $propertyName, $propertyValue){
		if($propertyValue != null) {
			$property = $this->propertyRepository->findOneBy(array('name' => $propertyName));
			$productProperty = $this->productPropertyRepository->createNew();
			$productProperty
				->setProperty($property)
				->setValue($propertyValue);
			$product->addProperty($productProperty);
		}
	}

	public function createVideoAction(Request $request)
	{
		$this->prepareRepository();
		$product = $this->repository->createNew();
		$form = $this->createFormBuilder()
			->add('name', 'text')
			->add('description', 'text')
			->add('price', 'number')
			->add('image', 'text')
			->add('genre', 'choice', array(
			    'choices'   => array(
			        'aventure'   => 'Aventure',
			        'horreur' => 'Horreur',
			        'comédie'   => 'Comédie',
			    )))
			->add('type', 'choice', array(
			    'choices'   => array(
			        'film'   => 'Film',
			        'documentaire' => 'Documentaire',
			        'concert'   => 'Concert',
			    )))
			->add('duree', 'integer')
			->add('format', 'choice', array(
			    'choices'   => array(
			        'avi'   => 'avi',
			        'mp4' => 'mp4'
			    )))
			->add('langue', 'text')
			->add('sublangue', 'text')
			->add('upload', 'file')
			->add('create', 'submit')
			
			->getForm();

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
				->setName($form["name"]->getData())
				->setDescription($form["description"]->getData())
				->setMetaKeywords("video");
			$this->addProperty($product, "price", $form["price"]->getData()*100);
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "duree", $form["duree"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "type", $form["type"]->getData());
			$this->addProperty($product, "langue", $form["langue"]->getData());
			$this->addProperty($product, "format", $form["format"]->getData());
			$this->addProperty($product, "subLangue", $form["sublangue"]->getData());
			$product->setFile($form["upload"]->getData());
				
			$product->upload();
			
				

			$this->manager->persist($product);
			$this->manager->flush(); // Save changes in database.
			
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}
		
		if ($this->getConfiguration()->isApiRequest()) {
			return $this->handleView($this->view($form));
		}
        return $this->showForm($form,'video');
	}
	
	public function createMusicAction(Request $request)
	{
		$this->prepareRepository();
		$product = $this->repository->createNew();
		$form = $this->createFormBuilder()
			->add('name', 'text')
			->add('description', 'text')
			->add('price', 'number')
			->add('image', 'text')
			->add('genre', 'choice', array(
			    'choices'   => array(
			        'chanson'   => 'Chanson',
			        'rock' => 'Rock',
			        'rap'   => 'Rap',
			    )))
			->add('duree', 'integer')
			->add('nbPistes', 'integer')
			->add('artiste', 'text')
			->add('format', 'choice', array(
			    'choices'   => array(
			        'mp3'   => 'mp3',
			        'wav' => 'wav',
			        'ogg'   => 'ogg',
			    )))
			    ->add('upload', 'file')
			->add('create', 'submit')
			->getForm();

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
				->setName($form["name"]->getData())
				->setDescription($form["description"]->getData())
				->setMetaKeywords("music");
			$this->addProperty($product, "price", $form["price"]->getData()*100);
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "duree", $form["duree"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "nbPistes", $form["nbPistes"]->getData());
			$this->addProperty($product, "artiste", $form["artiste"]->getData());
			$this->addProperty($product, "format", $form["format"]->getData());
			$product->setFile($form["upload"]->getData());
			
			$product->upload();

			$this->manager->persist($product);
			$this->manager->flush(); // Save changes in database.
			
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}

		if ($this->getConfiguration()->isApiRequest()) {
			return $this->handleView($this->view($form));
		}
		return $this->showForm($form,'music');
	}

	public function createBookAction(Request $request)
	{			
		$this->prepareRepository();
		$product = $this->repository->createNew();
		$form = $this->createFormBuilder()
			->add('name', 'text')
			->add('description', 'text')
			->add('price', 'number')
			->add('image', 'text')
			->add('genre', 'choice', array(
			    'choices'   => array(
			        'roman'   => 'Roman',
			        'essai' => 'Essai',
			        'biographie'   => 'Biographie',
			    )))
			->add('langue', 'text')
			->add('type', 'choice', array(
			    'choices'   => array(
			        'livre'   => 'Livre',
			        'magazine' => 'Magazine'
			    )))
			->add('format', 'choice', array(
			    'choices'   => array(
			        'epub'   => 'ePub',
			        'pdf' => 'pdf',
			        'mobi'   => 'mobi',
			    )))
			->add('auteur', 'text')
			->add('upload', 'file')
			->add('create', 'submit')
			->getForm();

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
				->setName($form["name"]->getData())
				->setDescription($form["description"]->getData())
				->setMetaKeywords("book");
			$this->addProperty($product, "price", $form["price"]->getData()*100);
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "langue", $form["langue"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "type", $form["type"]->getData());
			$this->addProperty($product, "auteur", $form["auteur"]->getData());
			$this->addProperty($product, "format", $form["format"]->getData());
			$product->setFile($form["upload"]->getData());
			
			$product->upload();

			$this->manager->persist($product);
			$this->manager->flush(); // Save changes in database.
			
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}
		
		if ($this->getConfiguration()->isApiRequest()) {
			return $this->handleView($this->view($form));
		}
		return $this->showForm($form,'book');
	}
	
	public function createGameAction(Request $request)
	{
		$this->prepareRepository();
		$product = $this->repository->createNew();
		$form = $this->createFormBuilder()
		->add('name', 'text')
		->add('description', 'text')
		->add('price', 'number')
		->add('image', 'text')
		->add('genre', 'choice', array(
			    'choices'   => array(
			        'stratégie'   => 'Stratégie',
			        'aventure' => 'Aventure',
			        'sport'   => 'Sport',
			    )))
		->add('plateforme', 'choice', array(
			    'choices'   => array(
			        'windows'   => 'Windows',
			        'linux' => 'Linux',
			        'macOS'   => 'MacOS',
			    	'android'   => 'Android'
			    )))
		->add('PEGI', 'choice', array(
			    'choices'   => array(
			        '3+'   => '3+',
			        '12+' => '12+',
			        '16+'   => '16+',
			    	'18+'   => '18+'
			    )))
			    ->add('upload', 'file')
		->add('create', 'submit')
		->getForm();
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
			->setName($form["name"]->getData())
			->setDescription($form["description"]->getData())
			->setMetaKeywords("game");
			$this->addProperty($product, "price", $form["price"]->getData()*100);
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "plateforme", $form["plateforme"]->getData());
			$this->addProperty($product, "PEGI", $form["PEGI"]->getData());
			$product->setFile($form["upload"]->getData());
			
			$product->upload();
	
			$this->manager->persist($product);
			$this->manager->flush(); // Save changes in database.
				
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}
	
		if ($this->getConfiguration()->isApiRequest()) {
			return $this->handleView($this->view($form));
		}
		return $this->showForm($form,'game');
	}
	
	public function createTicketAction(Request $request)
	{
		$this->prepareRepository();
		$product = $this->repository->createNew();
		$form = $this->createFormBuilder()
		->add('name', 'text')
		->add('description', 'text')
		->add('type', 'text')
		->add('price', 'number')
		->add('image', 'text')
		->add('genre', 'choice', array(
			    'choices'   => array(
			        'concert'   => 'Concert',
			        'théâtre' => 'Théâtre',
			        'humour'   => 'Humour',
			    	'comédie musicale'   => 'Comédie musicale'
			    )))
		->add('quantite', 'integer')
		->add('lieu', 'text')
		->add('dateEvent', 'text')
		->add('upload', 'file')
		->add('create', 'submit')
		->getForm();
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
			->setName($form["name"]->getData())
			->setDescription($form["description"]->getData())
			->setMetaKeywords("ticket");
			$this->addProperty($product, "price", $form["price"]->getData()*100);
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "type", $form["type"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "quantite", $form["quantite"]->getData());
			$this->addProperty($product, "lieu", $form["lieu"]->getData());
			$this->addProperty($product, "dateEvent", $form["dateEvent"]->getData());
			$product->setFile($form["upload"]->getData());
			
			$product->upload();
	
			$this->manager->persist($product);
			$this->manager->flush(); // Save changes in database.
				
			return $this->showCreatedProduct($product,$form["price"]->getData(),$form["image"]->getData());
		}
	
		if ($this->getConfiguration()->isApiRequest()) {
			return $this->handleView($this->view($form));
		}
		return $this->showForm($form,'ticket');
	}

	function showCreatedProduct($product,$price, $image){
		$view = $this
			->view()
			->setTemplate($this->getConfiguration()->getTemplate('show.html'))
			->setData(array('product' => $product,'price' => $price, 'image' => $image));
		return $this->handleView($view);
	}
	
	function showProductAction($id){
		$repository = $this->container->get('sylius.repository.product');
		$product = $repository->find(intval($id));
		$price = intval($product->getPropertyByName("price")->__toString())/100;
		$image = $product->getPropertyByName("image");
		
		
		$view = $this
		->view()
		->setTemplate($this->getConfiguration()->getTemplate('show.html'))
		->setData(array('product' => $product,'price' => $price, 'image' => $image));
		return $this->handleView($view);
	}

	function showForm($form,$type){
		$view = $this->view()
			->setTemplate($this->getConfiguration()->getTemplate('create.html'))
			->setData(array(
				$this->getConfiguration()->getResourceName() => $this->createNew(),
				'form' => $form->createView(),
				'type' => $type
		));
		return $this->handleView($view);
	}
}
