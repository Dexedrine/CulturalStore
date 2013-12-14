<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;

class CommuntyControllerTest extends WebTestCase {
	private static  $em;
	private static $repository;
	private static $theme;
	private static $tagManager;
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		 
		self::$em = static::$kernel->getContainer ()->get ( 'doctrine' )->getManager ();
		
		self::$repository = self::$em->getRepository ( 'CSCommunityBundle:Theme' );
		
		self::$tagManager = static::$kernel->getContainer ()->get ( 'fpn_tag.tag_manager' );
		
		self::$theme = new Theme ();
		self::$theme->setTitle ( "test" );
	}
	
	public static  function tearDownAfterClass() {
		$theme = self::$repository->findOneBy ( array (
				'title' => self::$theme->getTitle () 
		) );
		
		self::$tagManager->replaceTags ( array (), $theme );
		self::$tagManager->saveTagging ( $theme );
		
		self::$em->remove ( $theme );
		self::$em->flush ();
	}
	


	public function testHome() {
		$client = static::createClient ();
	
		$crawler = $client->request ( 'GET', '/community/' );
	}
	
	public function testCreate() {
		$client = static::createClient ();
		
		$crawler = $client->request ( 'GET', '/community/create' );
		
		$form = $crawler->selectButton ( '_submit' )->form ();
		
		// set some values
		$form ['theme[title]'] = self::$theme->getTitle ();
		
		// submit the form
		$crawler = $client->submit ( $form );
		
		$theme = self::$repository->findOneBy ( array (
				'title' => self::$theme->getTitle () 
		) );
		
		$this->assertEquals ( $theme->getTitle (), "test" );
	}
	
	public function testWrongCreate() {
		$client = static::createClient();
	
		$crawler = $client->request('GET', '/community/create');
	
		$form = $crawler->selectButton('_submit')->form();
	
		// set some values
		$form['theme[title]']  = "";
	
	
		// submit the form
		$crawler = $client->submit($form);
	}
	/**
	 * @depends testCreate
	 */
	public function testAddCommunity() {
		$client = static::createClient ();
		
		$theme = self::$repository->findOneBy ( array (
				'title' => self::$theme->getTitle () 
		) );
		
		
		$crawler = $client->request ( 'GET', '/community/add_community/' . $theme->getId () );
		
		$form = $crawler->selectButton ( '_submit' )->form ();
		
		// set some values
		$form ['theme[tags]'] = "test,test1,test2";
		
		// submit the form
		$crawler = $client->submit ( $form );
		
		self::$tagManager->loadTagging ( $theme );
		
		$communities = $theme->getTags(); 
		
		
		$this->assertEquals(count($communities), 3);
		$this->assertContains("test", $communities );
		$this->assertContains("test1", $communities );
		$this->assertContains("test2", $communities );
		
	}
}