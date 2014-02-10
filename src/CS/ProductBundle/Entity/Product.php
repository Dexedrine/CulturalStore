<?php
namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineExtensions\Taggable\Taggable;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Bundle\ProductBundle\Model\Product as BaseProduct;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CS\ProductBundle\Entity\Product
 * 
 * @ORM\Entity
 */
class Product  extends BaseProduct implements Taggable
{
	/**
	 * @Assert\File()
	 * 
	 */
	public $file;
	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	public $path;
	
	public function getAbsolutePath()
	{
		return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
	}
	
	public function getWebPath()
	{
		return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
	}
	
	protected function getUploadRootDir()
	{
		// le chemin absolu du rŽpertoire o les documents uploadŽs doivent tre sauvegardŽs
		return __DIR__.'/../../../../tmp/'.$this->getUploadDir();
	}
	
	protected function getUploadDir()
	{
		// on se dŽbarrasse de Ç __DIR__ È afin de ne pas avoir de problme lorsqu'on affiche
		// le document/image dans la vue.
		return 'uploads/documents';
	}
	
	
	protected $communities;

	public function getId()
	{
		return $this->id;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($title)
	{
		return $this->title = $title;
	}

	public function getTaggableType()
	{
		return 'product';
	}

	public function getTaggableId()
	{
		return $this->getId();
	}

	public function getTags()
	{
		$this->communities = $this->communities ?: new ArrayCollection();
		return $this->communities;
	}
	
	public function removeTag($tag)
	{
		$this->communities = $this->communities ?: new ArrayCollection();
	
		$this->communities->removeElement($tag);
	
	}
	
	public function setTags($tags) {
		$this->communities->clear();
		foreach($tags as $tag) {
			$this->communities->add($tag);
		}
	}
	
	public function addTag($tag)
	{
		$this->communities = $this->communities ?: new ArrayCollection();
		if(!$this->communities->contains($tag)){
			$this->communities->add($tag);
		}
	}
	
	public function getPrice(){
		foreach ($this->getProperties() as $property){
			if($property->getName() == "price") return intval($property->getValue());
		}
	}
	public function upload()
	{
		// la propriŽtŽ Ç file È peut tre vide si le champ n'est pas requis
		if (null === $this->file) {
			return;
		}
	
		// utilisez le nom de fichier original ici mais
		// vous devriez Ç l'assainir È pour au moins Žviter
		// quelconques problmes de sŽcuritŽ
	
		// la mŽthode Ç move È prend comme arguments le rŽpertoire cible et
		// le nom de fichier cible o le fichier doit tre dŽplacŽ
		
		$this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
	
		// dŽfinit la propriŽtŽ Ç path È comme Žtant le nom de fichier o vous
		// avez stockŽ le fichier
		$this->path = $this->file->getClientOriginalName();
	
		// Ç nettoie È la propriŽtŽ Ç file È comme vous n'en aurez plus besoin
		$this->file = null;
	}
	
	public function setFile($file){
		return $this->file = $file;
	}
			

}