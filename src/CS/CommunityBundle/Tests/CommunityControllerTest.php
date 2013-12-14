<?php

namespace CS\ProductBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use CS\CommunityBundle\Entity\Theme;

class CommuntyControllerTest extends WebTestCase {
	


	public function testHome() {
		$client = static::createClient ();
	
		$crawler = $client->request ( 'GET', '/community/' );
	}
}