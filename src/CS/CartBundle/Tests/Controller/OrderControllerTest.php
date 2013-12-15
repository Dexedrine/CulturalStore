<?php

namespace CS\CartBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderControllerTest extends WebTestCase
{
	public function testShowOrders()
	{
		$client = static::createClient();
	
		$crawler = $client->request('GET', '/orders/list/');
	}
    
}
