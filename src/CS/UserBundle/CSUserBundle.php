<?php

namespace CS\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CSUserBundle  extends Bundle {
        
        public function getParent() {
                return 'FOSUserBundle';
        }
        
}