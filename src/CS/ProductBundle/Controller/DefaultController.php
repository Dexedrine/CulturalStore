<?php

namespace CS\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;

class DefaultController extends ResourceController
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
		$this->prepareRepository();
		$property = $this->propertyRepository->findOneBy(array('name' => $propertyName));
		$productProperty = $this->productPropertyRepository->createNew();

		$productProperty
			->setProperty($property)
			->setValue($propertyValue);

		$product->addProperty($productProperty);
	}

	public function createVideoAction(Request $request)
	{
		$this->prepareRepository();
		$product = $this->repository->createNew();	
		$config = $this->getConfiguration();
		$resource = $this->createNew();
		$form = $this->createFormBuilder()
			->add('name', 'text')
			->add('description', 'text')
			->add('price', 'integer')
			->add('image', 'text')
			->add('genre', 'text')
			->add('type', 'text')
			->add('duree', 'integer')
			->add('langue', 'text')
			->add('sublangue', 'text')
			->add('create', 'submit')
			->getForm();

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {

			$product
				->setName($form["name"]->getData())
				->setDescription($form["description"]->getData());
				
			$this->addProperty($product, "price", $form["price"]->getData());
			$this->addProperty($product, "image", $form["image"]->getData());
			$this->addProperty($product, "duree", $form["duree"]->getData());
			$this->addProperty($product, "genre", $form["genre"]->getData());
			$this->addProperty($product, "type", $form["type"]->getData());
			$this->addProperty($product, "langue", $form["langue"]->getData());
			$this->addProperty($product, "subLangue", $form["sublangue"]->getData());
			

			$this->manager->persist($product);
			$this->manager->flush(); // Save changes in database.
		}

		if ($config->isApiRequest()) {
			return $this->handleView($this->view($form));
		}

		$view = $this
			->view()
			->setTemplate($config->getTemplate('create.html'))
			->setData(array(
					$config->getResourceName() => $resource,
					'form'                     => $form->createView()
			));

		return $this->handleView($view);
	}

	public function createMusicAction(Request $request)
	{
		$config = $this->getConfiguration();

		$resource = $this->createNew();
		$form = $this->getForm($resource);

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$event = $this->create($resource);
			if (!$event->isStopped()) {
				$this->setFlash('success', 'create');

				return $this->redirectTo($resource);
			}

			$this->setFlash($event->getMessageType(), $event->getMessage(), $event->getMessageParams());
		}

		if ($config->isApiRequest()) {
			return $this->handleView($this->view($form));
		}

		$view = $this
		->view()
		->setTemplate($config->getTemplate('create.html'))
		->setData(array(
				$config->getResourceName() => $resource,
				'form'                     => $form->createView()
		))
		;

		return $this->handleView($view);
	}

	public function createBookAction(Request $request)
	{
		$config = $this->getConfiguration();

		$resource = $this->createNew();
		$form = $this->getForm($resource);

		if ($request->isMethod('POST') && $form->bind($request)->isValid()) {
			$event = $this->create($resource);
			if (!$event->isStopped()) {
				$this->setFlash('success', 'create');

				return $this->redirectTo($resource);
			}

			$this->setFlash($event->getMessageType(), $event->getMessage(), $event->getMessageParams());
		}

		if ($config->isApiRequest()) {
			return $this->handleView($this->view($form));
		}

		$view = $this
		->view()
		->setTemplate($config->getTemplate('create.html'))
		->setData(array(
				$config->getResourceName() => $resource,
				'form'                     => $form->createView()
		))
		;

		return $this->handleView($view);
	}
}
