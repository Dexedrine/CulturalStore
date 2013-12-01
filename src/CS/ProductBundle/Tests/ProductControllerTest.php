<?php
namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\ProductBundle\Controller\ProductController;

class ProductControllerTest extends WebTestCase{
	public function setUp() {
		$pc = new ProductController;
	}
	
	public function testAddProperty() {
		$product = $pc->repository->createNew();
		$pc->addProperty($product,"price",10);
		
		$this->assertEquals($product->getProperties()["price"], 10);
	}
}