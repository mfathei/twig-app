<?php

	require_once 'vendor/autoload.php';

	$loader = new Twig_Loader_Filesystem('views');
	$twig = new Twig_Environment($loader, array(
		'cache' => 'cache'
	));

	echo $twig->render('index.html', array(
		'name' => 'Mahdy',
		'age'  => 35
	));