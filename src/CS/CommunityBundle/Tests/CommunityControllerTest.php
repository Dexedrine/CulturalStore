<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;

class CommuntyControllerTest extends WebTestCase {
	


	public function testHome() {
		$client = static::createClient ();
	
		$crawler = $client->request ( 'GET', '/community/' );
	}
	
	public function tesPageCommunity() {
		$client = static::createClient ();
	
		$crawler = $client->request ( 'GET', '/community/page_community/test' );
	}
	
	public function testShowCommunitiesType() {
		$client = static::createClient ();
	
		$crawler = $client->request ( 'GET', '/community/show_all_communities ' );
	}
}