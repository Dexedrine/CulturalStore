<?php
namespace CS\CommunityBundle\Form\Type;

use Symfony\Component\Form\DataTransformerInterface;

class CommunityTransformer implements DataTransformerInterface
{
	private $tagManager;

	public function __construct($tagManager)
	{ $this->tagManager = $tagManager; }

	public function transform($tags)
	{ return join(', ', $tags->toArray()); }

	public function reverseTransform($tags)
	{
		return $this->tagManager->loadOrCreateTags(
				$this->tagManager->splitTagNames($tags)
		);
	}
}