<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;
use CS\ProductBundle\Entity\Product;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class FournisseurCommuntyControllerTest extends WebTestCase {
	private static  $em;
	private static $repository;
	private static $product;
	private static $theme;
	private static $saveTagging;
	private static $tag;
	private static $tagManager;
	private static $productManager;
	private static $client;
	
	
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		
		self::$client = static::createClient();
		 
		self::$em = static::$kernel->getContainer ()->get ( 'doctrine' )->getManager ();
		
		self::$repository = self::$em->getRepository ( 'CSCommunityBundle:Theme' );
		self::$productManager =static::$kernel->getContainer ()->get('sylius.repository.product');
		self::$tagManager = static::$kernel->getContainer ()->get ( 'fpn_tag.tag_manager' );
		
		self::$tag = self::$tagManager->loadOrCreateTag("test");
		
		$titleTheme = "Spectacle";
		self::$theme = self::$repository->findOneBy ( array (
				'title' =>  $titleTheme) );
		
		self::$tagManager->loadTagging(self::$theme);
		
		self::$saveTagging = array();
		foreach(self::$theme->getTags() as $community){
			self::$saveTagging[] = $community;
		}
		
		self::$tagManager->addTag(self::$tag,self::$theme);
		
		self::$tagManager->saveTagging(self::$theme);
		
		
		self::$product = new Product();
		
		self::$product
		->setName("test")
		->setDescription("test")
		->setMetaKeywords("ticket");
		
		self::$em->persist(self::$product);
		self::$em->flush();
		
		
		$session = self::$client->getContainer()->get('session');
		
		$firewall = 'main';
		$token = new UsernamePasswordToken('fournisseur', 'test', $firewall, array('ROLE_FOURNISSEUR'));
		$session->set('_security_'.$firewall, serialize($token));
	
		$session->save();
		
	}
	
	public static  function tearDownAfterClass() {
		
		self::$tagManager->replaceTags ( self::$saveTagging,  self::$theme );
		self::$tagManager->saveTagging (  self::$theme );
		
		self::$tagManager->replaceTags ( array (),  self::$product );
		self::$tagManager->saveTagging (  self::$product );
		
		self::$em->remove ( self::$tag );
		self::$em->remove ( self::$product );
		self::$em->flush ();
	}
	
	//test visuel
	public function testManageCommuniProduct(){
		$crawler = self::$client->request ( 'GET', '/community/fournisseur/'. self::$product->getId() );

	}
	
	public function testAddCommunityProduct(){	
		$crawler = self::$client->request ( 'GET', '/community/fournisseur/add_community/test/'. self::$product->getId() );
		
		self::$tagManager->loadTagging(self::$product);
		$communities = self::$product->getTags();
		
		$this->assertEquals(1,count($communities));
	}
	/**
	 * @depends testAddCommunityProduct
	 */
	public function testShowCommunitiesProduct() {
	
		$crawler = self::$client->request ( 'GET', '/community/fournisseur/show_product_communities/'. self::$product->getId() );
	
		$this->assertEquals(1,$crawler->filter('div.tag')->count());
		$this->assertEquals(1,$crawler->filter('div.tag:contains("test")')->count());
	}
	/**
	 * @depends testShowCommunitiesProduct
	 */
	public function testRemoveCommunityProduct(){
		$crawler = self::$client->request ( 'GET', '/community/fournisseur/remove_community/test/'. self::$product->getId() );
		
		self::$tagManager->loadTagging(self::$product);
		$communities = self::$product->getTags();
		
		$this->assertEquals(0,count($communities));
	}
}