<?php

namespace CS\ProductBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ScoreCommand extends ContainerAwareCommand {
	
	protected function configure() {
		$this->setName ( 'product:score' )->setDescription ( 'Recharger les scores products' )->addArgument ( 'name', InputArgument::OPTIONAL, 'Product' );
	}
	
	protected function execute(InputInterface $input, OutputInterface $output) {
		$name = $input->getArgument ( 'name' );
		if ($name) {
			$text = 'Bonjour ' . $name;
		} else {
			$text = 'Bonjour';
		}
		
		$products = $this->getContainer ()->get ( 'doctrine' )->getRepository ( 'CSProductBundle:Product' )->findAll ();
		
		foreach ( $products as $product ) {
			$score = 0;
			$score += $this->scoreNouveaute ( $product );
			$score += $this->scoreNote ( $product );
			$score += $this->scoreVisite ( $product );
			$score += $this->scoreAchat ( $product );
			$score += $this->scoreConversion ( $product );
			$text .= $product->getName () . " score : " . $score . "\n";
		}
		
		$output->writeln ( $text );
	}
	
	public function scoreNouveaute($product) {
		$creationDate = $product->getCreatedAt ();
		$datejour = new \DateTime ();
		
		$interval = $creationDate->diff ( $datejour );
		
		$score = 0;
		
		if ($interval->days < "7") {
			$score = 10;
		} elseif ($interval->days >= "7" && $interval->days < "30") {
			$score = 5;
		}
		
		return $score * 6;
	}
	
	public function scoreNote($product) {
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
		
		return $score * 2;
	}
	
	public function scoreVisite($product) {
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
			} elseif ($infoTracking->getVisite() > 1) {
				$score = 1;
			}
	}
		
		return $score * 2;
	}
	public function scoreAchat($product) {
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
			} elseif ($infoTracking->getAchat() > 1) {
				$score = 1;
			}
		}
	
		return $score * 2;
	}
	public function scoreConversion($product) {
		$infoTracking = $product->getInfoTracking ();
	
		$score = 0;
		$conversion = 0;
		
		if($infoTracking){
			print_r($product->getName()." ".$infoTracking->getAchat()."/".$infoTracking->getVisite()."\n");
			$conversion = $infoTracking->getAchat() / $infoTracking->getVisite();	
			print_r($conversion);
		}
		
		$score = $conversion * 10;
		
		return $score * 4;
	}
}

?>