<?php

namespace CS\CommunityBundle\Repository;

use DoctrineExtensions\Taggable\Entity\TagRepository as BaseTagRepository;
use Doctrine\ORM\AbstractQuery;

/**
 * Common query-related methods for returning tag information
 *
 * @author Ryan Weaver <ryan@knplabs.com>
 */
class CommunityRepository extends BaseTagRepository
{
       /**
     * Returns a query builder built to return tag counts for a given type
     *
     * @see getTagsWithCountArray
     * @param $taggableType
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTagsWithCountArrayQueryBuilder($taggableType)
    {
        $qb = $this->getTagsQueryBuilder($taggableType)
            ->groupBy('tagging.tag, tag.'.$this->tagQueryField)
            ->select('tag.'.$this->tagQueryField.', COUNT(tagging.tag) as tag_count')
            ->orderBy('tag_count', 'DESC')
        ;

        return $qb;
    }

   
}