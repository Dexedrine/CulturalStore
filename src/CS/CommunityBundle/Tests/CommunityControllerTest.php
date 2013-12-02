<?php
namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommuntyControllerTest extends WebTestCase{
	
	private $em;
	private $repository;
	
	public function setUp() {
		static::$kernel = static::createKernel();
		static::$kernel->boot();
				
		$this->em = static::$kernel->getContainer()
			->get('doctrine')
            ->getManager();
		
		$this->repository = $this->em->getRepository('CSCommunityBundle:Theme');
		
	}
	
	public function testCreate() {
		$client = static::createClient();
		
		$crawler = $client->request('GET', '/community/create');
		
		$form = $crawler->selectButton('_submit')->form();
		
		// set some values
		$form['theme[title]']  = "test";
		
		
		// submit the form
		$crawler = $client->submit($form);
		
		$theme = $this->repository->findOneBy(array('title' => "test"));
		
		$this->assertEquals($theme->title,"test");
	}
	
	
}