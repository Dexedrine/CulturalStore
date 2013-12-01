<?php

namespace CS\ProductBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;

class SearchController extends ResourceController {


	private function searchProduct($words) {
		//$em = $this->getDoctrine()->getEntityManager();
		$repository = $this->container->get('sylius.repository.product');
		$products = $repository->findAll();
		//$query = $em->createQuery('Select p FROM Sylius\Bundle\ProductBundle\Model:Product p');
				
// 				->createQuery(
// 						 '	Select p FROM (select sylius_product.id, name || ',' || description || ',' || array_to_string(array_agg(value),',') as words from sylius_product left join sylius_product_property on sylius_product.id = sylius_product_property.product_id group by sylius_product.id) as products 
// 						right join SyliusBundle:Product p on  Product.id = products.id   ' //where words like
// 						);//->setParameter('price', '19.99');
		
	}

}
