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
				new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
				new CS\UserBundle\CSUserBundle(),
				new CS\DesignBundle\CSDesignBundle(),
				new FOS\UserBundle\FOSUserBundle(),
				new CS\CommunityBundle\CSCommunityBundle(),

				//bundles for Sylius (ecommerce bundles)
				new FOS\RestBundle\FOSRestBundle(),
				new JMS\SerializerBundle\JMSSerializerBundle($this),
				new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
				new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
				new Sylius\Bundle\ProductBundle\SyliusProductBundle(),
				new Sylius\Bundle\VariableProductBundle\SyliusVariableProductBundle(),
				new Sylius\Bundle\PromotionsBundle\SyliusPromotionsBundle(),
				new Sylius\Bundle\ResourceBundle\SyliusResourceBundle(),
				new Sylius\Bundle\MoneyBundle\SyliusMoneyBundle(),
				new Sylius\Bundle\OrderBundle\SyliusOrderBundle(),
				new Sylius\Bundle\CartBundle\SyliusCartBundle(),

				//doctrine must be added after sylius
				new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            	new CS\ProductBundle\CSProductBundle()
		);

		if (in_array($this->getEnvironment(), array('dev', 'test'))) {
			$bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
			$bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
			$bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
		}

		return $bundles;
	}

	public function registerContainerConfiguration(LoaderInterface $loader) {
		$loader->load(__DIR__ . '/config/config_' . $this->getEnvironment()
				. '.yml');
	}
}
