<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class UserCommuntyControllerTest extends WebTestCase {
	private static  $em;
	private static $repository;
	private static $user;
	private static $theme;
	private static $tagManager;
	private static $userManager;
	private static $client;
	
	
	
	public static function setUpBeforeClass() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		
		self::$client = static::createClient();
		 
		self::$em = static::$kernel->getContainer ()->get ( 'doctrine' )->getManager ();
		
		self::$repository = self::$em->getRepository ( 'CSCommunityBundle:Theme' );
		self::$userManager =static::$kernel->getContainer ()->get('pugx_user_manager');
		self::$tagManager = static::$kernel->getContainer ()->get ( 'fpn_tag.tag_manager' );
		
		self::$theme = new Theme ();
		self::$theme->setTitle ( "test" );
		
		$tag = self::$tagManager->loadOrCreateTag("test");
		
		self::$tagManager->addTag($tag,self::$theme);
		
		self::$em->persist(self::$theme);
		self::$em->flush();
		
		self::$tagManager->saveTagging(self::$theme);
		
		
		self::$user = self::$userManager->createUser ();
		
		self::$user->setEmail ( "test_community@test.fr" );
		
		self::$user->setPrenom ( "test" );
		self::$user->setOptinDonnee(true);
		self::$user->setOptinNewsletter(true);
		self::$user->setNom ( "test" );
		self::$user->setPlainPassword ( "test" );
		self::$user->setEnabled ( true );
		// Persist the user to the database
		self::$userManager->updateUser ( self::$user );
		
		
		$session = self::$client->getContainer()->get('session');
		
		$firewall = 'main';
		$token = new UsernamePasswordToken(self::$user, 'test', $firewall, array('ROLE_CLIENT'));
		$session->set('_security_'.$firewall, serialize($token));
	
		$session->save();
		
	}
	
	public static  function tearDownAfterClass() {
		self::$tagManager->replaceTags ( array (),  self::$theme );
		self::$tagManager->saveTagging (  self::$theme );
		
		self::$tagManager->replaceTags ( array (),  self::$user );
		self::$tagManager->saveTagging (  self::$user );
		
		self::$em->remove ( self::$user );
		self::$em->remove ( self::$theme );
		self::$em->flush ();
	}
	
	//test visuel
	public function testManageCommunity(){
		$crawler = self::$client->request ( 'GET', '/community/user/manage' );

	}
	
	public function testAddCommunityUserSession(){	
		$crawler = self::$client->request ( 'GET', '/community/user/add_community/test' );
		
		self::$tagManager->loadTagging(self::$user);
		$communities = self::$user->getTags();
		
		$this->assertEquals(1,count($communities));
	}
	/**
	 * @depends testAddCommunityUserSession
	 */
	public function testShowCommunitiesUserSession() {
	
		$crawler = self::$client->request ( 'GET', '/community/user/show_communities' );
	
		$this->assertEquals(1,$crawler->filter('div.tag')->count());
		$this->assertEquals(1,$crawler->filter('div.tag:contains("test")')->count());
	}
	/**
	 * @depends testShowCommunitiesUserSession
	 */
	public function testRemoveCommunityUserSession(){
		$crawler = self::$client->request ( 'GET', '/community/user/remove_community/test' );
		
		self::$tagManager->loadTagging(self::$user);
		$communities = self::$user->getTags();
		
		$this->assertEquals(0,count($communities));
	}
}