<?php

namespace CS\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository as BaseEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

class ProductPaginator extends BaseEntityRepository {
	
	public function createPaginator(array $criteria = null, array $orderBy = null) {
			
		$queryBuilder = $this->createQueryBuilder('p');
		
		return $this->getPaginator ( $queryBuilder );
	}
	
	public function getPaginator(QueryBuilder $queryBuilder) {
		return new Pagerfanta ( new DoctrineORMAdapter ( $queryBuilder ) );
	}
	
	public function getName(){
		return 'cs_product_paginator';
	}
}