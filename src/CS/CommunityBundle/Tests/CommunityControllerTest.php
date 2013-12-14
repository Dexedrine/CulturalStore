<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;

class CommuntyControllerTest extends WebTestCase {
	

	//test visuel
	public function testHome() {
		$client = static::createClient ();
	
		$crawler = $client->request ( 'GET', '/community/' );
	}
	//test visuel
	public function tesPageCommunity() {
		$client = static::createClient ();
	
		$crawler = $client->request ( 'GET', '/community/page_community/test' );
	}
	//test visuel
	public function testShowCommunitiesType() {
		$client = static::createClient ();
	
		$crawler = $client->request ( 'GET', '/community/show_all_communities ' );
	}
}