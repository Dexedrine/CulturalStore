<?php

namespace CS\CommunityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FPN\TagBundle\Entity\TagManager;

class CommunityType extends AbstractType {
public function __construct(TagManager $tagManager)
    { $this->tagManager = $tagManager; }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new CommunityTransformer($this->tagManager);
        $builder->addModelTransformer($transformer);
    }

    public function getParent()
    { return 'text'; }

    public function getName()
    { return 'community_entry'; }
}
