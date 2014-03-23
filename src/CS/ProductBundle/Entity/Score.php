<?php

namespace CS\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CS\ProductBundle\Entity\Score
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Score{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * 
	 *
	 * @var int
	 * @ORM\Column(name="score_visite", type="integer")
	 */
	protected $scoreVisite ;
	
	/**
	 * 
	 *
	 * @var int
	 * @ORM\Column(name="score_achat", type="integer")
	 */
	protected $scoreAchat;
	
	/**
	 * 
	 *
	 * @var int
	 * @ORM\Column(name="score_nouveaute", type="integer")
	 */
	protected $scoreNouveaute;
	
	/**
	 * 
	 *
	 * @var int
	 * @ORM\Column(name="score_note", type="integer")
	 */
	protected $scoreNote;
	
	/**
	 * 
	 *
	 * @var int
	 * @ORM\Column(name="score_conversion", type="integer")
	 */
	protected $scoreConversion;
	
		
	/**
	 * Constructor.
	 */
	public function __construct($product) {
		$this->calculScoreNouveaute($product);
   		$this->calculScoreNote($product);
   		$this->calculScoreVisite($product);
   		$this->calculScoreConversion($product);
   		$this->calculScoreAchat($product);
	}
	
	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set visite
     *
     * @param string $visite
     * @return InfoTracking
     */
    public function setScoreVisite($visite)
    {
        $this->visite = $visite;
    
        return $this;
    }

    /**
     * Get visite
     *
     * @return int
     */
    public function getScoreVisite()
    {
        return $this->visite;
    }

    /**
     * Set scoreAchat
     *
     * @param int $scoreAchat
     * @return InfoTracking
     */
    public function setScoreAchat($scoreAchat)
    {
        $this->scoreAchat = $scoreAchat;
    
        return $this;
    }

    /**
     * Get achat
     *
     * @return int
     */
    public function getScoreAchat()
    {
        return $this->scoreAchat;
    }

    

    /**
     * Set scoreConversion
     *
     * @param int $scoreConversion
     * @return InfoTracking
     */
    public function setScoreConversion($scoreConversion)
    {
    	$this->scoreConversion = $scoreConversion;
    
    	return $this;
    }
    
    /**
     * Get achat
     *
     * @return int
     */
    public function getScoreConversion()
    {
    	return $this->scoreConversion;
    }
    

    /**
     * Set scoreNote
     *
     * @param int $scoreNote
     * @return InfoTracking
     */
    public function setScoreNote($scoreNote)
    {
    	$this->scoreNote = $scoreNote;
    
    	return $this;
    }
    
    /**
     * Get achat
     *
     * @return int
     */
    public function getScoreNote()
    {
    	return $this->scoreNote;
    }
    

    /**
     * Set scoreNouveaute
     *
     * @param int $scoreNouveaute
     * @return InfoTracking
     */
    public function setScoreNouveaute($scoreNouveaute)
    {
    	$this->scoreNouveaute = $scoreNouveaute;
    
    	return $this;
    }
    
    /**
     * Get achat
     *
     * @return int
     */
    public function getScoreNouveaute()
    {
    	return $this->scoreNouveaute;
    }
    
    public function getScoreTotal()
    {
    	return $this->scoreNouveaute + $this->scoreAchat + $this->scoreConversion + $this->scoreVisite + $this->scoreNote;
    }
    
    public function calculScoreNouveaute($product) {
    	$creationDate = $product->getCreatedAt ();
    	$datejour = new \DateTime ();
    
    	$interval = $creationDate->diff ( $datejour );
    
    	$score = 0;
    
    	if ($interval->days < "7") {
    		$score = 10;
    	} elseif ($interval->days >= "7" && $interval->days < "30") {
    		$score = 5;
    	}
    
    	$this->scoreNouveaute= $score * 6;
    }
    
    public function calculScoreNote($product) {
    	$comments = $product->getComments ();
    
    	$moyenne = 0;
    	if ($comments->count () == 1) {
    			
    		$moyenne = 0;
    		foreach ( $comments as $comment ) {
    			$moyenne += $comment->getNote ();
    		}
    			
    		$moyenne = $moyenne / $comments->count ();
    	}
    
    	$score = $moyenne * 2;
    
    	$this->scoreNote = $score * 2;
    }
    
    public function calculScoreVisite($product) {
    	$infoTracking = $product->getInfoTracking ();
    
    	$score = 0;
    	if($infoTracking){
    		if ($infoTracking->getVisite() > 20000) {
    			$score = 10;
    		} elseif ($infoTracking->getVisite() > 10000) {
    			$score = 9;
    		} elseif ($infoTracking->getVisite() > 5000) {
    			$score = 8;
    		} elseif ($infoTracking->getVisite() > 4000) {
    			$score = 7;
    		} elseif ($infoTracking->getVisite() > 3000) {
    			$score = 6;
    		} elseif ($infoTracking->getVisite() > 1500) {
    			$score = 5;
    		} elseif ($infoTracking->getVisite() > 1000) {
    			$score = 4;
    		} elseif ($infoTracking->getVisite() > 500) {
    			$score = 3;
    		} elseif ($infoTracking->getVisite() > 50) {
    			$score = 2;
    		} elseif ($infoTracking->getVisite() >= 1) {
    			$score = 1;
    		}
    	}
    
    	$this->scoreVisite = $score * 2;
    }
    public function calculScoreAchat($product) {
    	$infoTracking = $product->getInfoTracking ();
    
    	$score = 0;
    	if($infoTracking){
    		if ($infoTracking->getAchat() > 1000) {
    			$score = 10;
    		} elseif ($infoTracking->getAchat() > 500) {
    			$score = 9;
    		} elseif ($infoTracking->getAchat() > 300) {
    			$score = 8;
    		} elseif ($infoTracking->getAchat() > 150) {
    			$score = 7;
    		} elseif ($infoTracking->getAchat() > 100) {
    			$score = 6;
    		} elseif ($infoTracking->getAchat() > 50) {
    			$score = 5;
    		} elseif ($infoTracking->getAchat() > 20) {
    			$score = 4;
    		} elseif ($infoTracking->getAchat() > 10) {
    			$score = 3;
    		} elseif ($infoTracking->getAchat() > 5) {
    			$score = 2;
    		} elseif ($infoTracking->getAchat() >= 1) {
    			$score = 1;
    		}
    	}
    
    	$this->scoreAchat = $score * 2;
    }
    
    public function calculScoreConversion($product) {
    	$infoTracking = $product->getInfoTracking ();
    
    	$score = 0;
    	$conversion = 0;
    
    	if($infoTracking && $infoTracking->getAchat() != 0 &&  $infoTracking->getVisite() != 0){
    		$conversion = $infoTracking->getAchat() / $infoTracking->getVisite();
    	}
    
    	$score = $conversion * 10;
    
    	$this->scoreConversion = round($score * 4);
    }
}