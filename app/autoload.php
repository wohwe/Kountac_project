<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

error_reporting(error_reporting() & ~E_USER_DEPRECATED);

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Html2Pdf_', __DIR__.'/../vendor/html2pdf/lib');

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
