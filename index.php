<?php
//Point d'entre de l'application, tres simple
// inclus les fichiers de config et d'authentification
// inclu l'autoloader de composer et lance l'appli
//@TODO Utiliser les namespaces pour mieux organiser
require 'config.php';
require 'util/Auth.php';

//we define the dir separator and the app path
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));

require_once (ROOT.DS.'vendor'.DS.'autoload.php');

// Load the Bootstrap!
$bootstrap = new Bootstrap();

$bootstrap->init();
