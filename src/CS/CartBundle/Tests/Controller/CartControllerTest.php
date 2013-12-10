<?php

namespace CS\CartBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CartControllerTest extends WebTestCase
{
    public function testShowCart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cart/');

        
    }
    
    
}
