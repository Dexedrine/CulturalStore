<?php

namespace CS\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository as BaseEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

class ProductPaginator extends BaseEntityRepository {
	
	public function createPaginator($fournisseur) {
			
		$queryBuilder = $this->createQueryBuilder('p')
							->join('p.fournisseur', 'f')
							->where('f.id = :fournisseur_id')
							->setParameter('fournisseur_id', $fournisseur->getId());
		
		return $this->getPaginator ( $queryBuilder );
	}
	
	public function getPaginator(QueryBuilder $queryBuilder) {
		return new Pagerfanta ( new DoctrineORMAdapter ( $queryBuilder ) );
	}
	
	public function getName(){
		return 'cs_product_paginator';
	}
}