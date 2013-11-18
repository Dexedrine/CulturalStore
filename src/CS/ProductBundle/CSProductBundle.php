<?php

namespace CS\ProductBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CSProductBundle extends Bundle
{
	public function getParent() {
		return 'SyliusProductBundle';
	}
}
