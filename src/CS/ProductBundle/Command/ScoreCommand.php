<?php

namespace CS\ProductBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use CS\ProductBundle\Entity\Score;

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
		$em = $this->getContainer ()->get('doctrine')->getEntityManager();
		foreach ( $products as $product ) {
			$product->setScore(new Score($product));
			$text .= $product->getName () . " score : " . $product->getScore() . "\n";
			
		}
		
		$em->flush();
		
		$output->writeln ( $text );
	}
	
}

?>