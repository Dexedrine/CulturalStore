<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * @var ClassLoader $loader
=======
 * @var $loader ClassLoader
>>>>>>> a9ec11a3ccfdace1b9ea1f2f561120defc296c6d
=======
 * @var ClassLoader $loader
>>>>>>> 23c8c0c1b9b8c038743b3c289a00f02d76ff1b9e
 */
$loader = require __DIR__ . '/../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
