<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
<<<<<<< HEAD
 * @var ClassLoader $loader
=======
 * @var $loader ClassLoader
>>>>>>> a9ec11a3ccfdace1b9ea1f2f561120defc296c6d
 */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
