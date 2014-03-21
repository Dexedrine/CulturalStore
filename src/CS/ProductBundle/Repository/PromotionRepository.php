<?php

namespace CS\ProductBundle\Repository;

use Doctrine\ORM\EntityRepository as BaseEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

class PromotionRepository extends BaseEntityRepository {
	
	public function createPaginator($fournisseur) {
			
		$queryBuilder = $this->createQueryBuilder('p')
							->where('p.fournisseur = :fournisseur ')
							->orderBy('p.beginDate', 'DESC')
							->setParameter('fournisseur', $fournisseur);
		
		return $this->getPaginator ( $queryBuilder );
	}
	
	public function getPaginator(QueryBuilder $queryBuilder) {
		return new Pagerfanta ( new DoctrineORMAdapter ( $queryBuilder ) );
	}
	
	public function getName(){
		return 'cs_product_paginator';
	}
}