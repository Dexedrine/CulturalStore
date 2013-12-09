<?php

namespace CS\CartBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CSCartBundle extends Bundle
{
	public function getParent() {
		return 'SyliusCartBundle';
	}
}
