<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
	public function registerBundles()
	{
		$bundles = array(
				new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
				new Symfony\Bundle\SecurityBundle\SecurityBundle(),
				new Symfony\Bundle\TwigBundle\TwigBundle(),
				new Symfony\Bundle\MonologBundle\MonologBundle(),
				new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
				new Symfony\Bundle\AsseticBundle\AsseticBundle(),
				new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
				new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
				
				new CS\UserBundle\CSUserBundle (),
				new CS\DesignBundle\CSDesignBundle (),
				new CS\CommunityBundle\CSCommunityBundle (),
				new CS\ProductBundle\CSProductBundle (),
				new CS\AdminBundle\CSAdminBundle (),
				new CS\FournisseurBundle\CSFournisseurBundle (),
				new CS\CartBundle\CSCartBundle (),
				
				//Gestion des utilisateurs
				new FOS\UserBundle\FOSUserBundle (),
				new PUGX\MultiUserBundle\PUGXMultiUserBundle (),
				
				//Pager
				new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle (),				
				// bundle to rock images !
				new Liip\ImagineBundle\LiipImagineBundle (),
				// Gestion des communautés
				new FPN\TagBundle\FPNTagBundle (),
				//Search 
				new JMS\SerializerBundle\JMSSerializerBundle(),
				new FOS\ElasticaBundle\FOSElasticaBundle (),
		);

		if (in_array($this->getEnvironment(), array('dev', 'test'))) {
			$bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
			$bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
			$bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
		}

		return $bundles;
	}

	public function registerContainerConfiguration(LoaderInterface $loader)
	{
		$loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
	}
}

