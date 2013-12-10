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
			->add('price', 'integer')
			->add('image', 'text')
			->add('genre', 'text')
			->add('type', 'text')
			->add('duree', 'integer')
			->add('format', 'text')
			->add('langue', 'text')
			->add('sublangue', 'text')
			->add('create', 'submit')
			->getForm();

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
				->setName($form["name"]->getData())
				->setDescription($form["description"]->getData())
				->setMetaKeywords("video");
			$this->addProperty($product, "price", $form["price"]->getData());
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "duree", $form["duree"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "type", $form["type"]->getData());
			$this->addProperty($product, "langue", $form["langue"]->getData());
			$this->addProperty($product, "format", $form["format"]->getData());
			$this->addProperty($product, "subLangue", $form["sublangue"]->getData());

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
			->add('price', 'integer')
			->add('image', 'text')
			->add('genre', 'text')
			->add('duree', 'integer')
			->add('nbPistes', 'integer')
			->add('artiste', 'text')
			->add('format', 'text')
			->add('create', 'submit')
			->getForm();

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
				->setName($form["name"]->getData())
				->setDescription($form["description"]->getData())
				->setMetaKeywords("music");
			$this->addProperty($product, "price", $form["price"]->getData());
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "duree", $form["duree"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "nbPistes", $form["nbPistes"]->getData());
			$this->addProperty($product, "artiste", $form["artiste"]->getData());
			$this->addProperty($product, "format", $form["format"]->getData());

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
			->add('price', 'integer')
			->add('image', 'text')
			->add('genre', 'text')
			->add('langue', 'text')
			->add('type', 'text')
			->add('format', 'text')
			->add('auteur', 'text')
			->add('create', 'submit')
			->getForm();

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
				->setName($form["name"]->getData())
				->setDescription($form["description"]->getData())
				->setMetaKeywords("book");
			$this->addProperty($product, "price", $form["price"]->getData());
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "langue", $form["langue"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "type", $form["type"]->getData());
			$this->addProperty($product, "auteur", $form["auteur"]->getData());
			$this->addProperty($product, "format", $form["format"]->getData());

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
		->add('price', 'integer')
		->add('image', 'text')
		->add('genre', 'text')
		->add('plateforme', 'text')
		->add('PEGI', 'text')
		->add('create', 'submit')
		->getForm();
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
			->setName($form["name"]->getData())
			->setDescription($form["description"]->getData())
			->setMetaKeywords("game");
			$this->addProperty($product, "price", $form["price"]->getData());
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "plateforme", $form["plateforme"]->getData());
			$this->addProperty($product, "PEGI", $form["plateforme"]->getData());
	
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
		->add('price', 'integer')
		->add('image', 'text')
		->add('genre', 'text')
		->add('quantite', 'integer')
		->add('lieu', 'text')
		->add('dateEvent', 'text')
		->add('create', 'submit')
		->getForm();
	
		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$product
			->setName($form["name"]->getData())
			->setDescription($form["description"]->getData())
			->setMetaKeywords("ticket");
			$this->addProperty($product, "price", $form["price"]->getData());
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "type", $form["langue"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "quantite", $form["type"]->getData());
			$this->addProperty($product, "lieu", $form["auteur"]->getData());
			$this->addProperty($product, "dateEvent", $form["format"]->getData());
	
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
		$price = $product->getPropertyByName("price");
		$image = $product->getPropertyByName("image");
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
