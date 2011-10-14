<?php
$config = Config::singleton();

$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');

$config->set('dbhost', 'localhost');
$config->set('dbname', 'nombrebasededatos');
$config->set('dbuser', 'usuario');
$config->set('dbpass', 'pass');
?>