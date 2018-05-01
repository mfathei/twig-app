<?php

	require_once 'vendor/autoload.php';

	// ------------------ config -----------------------------
	$loader = new Twig_Loader_Filesystem('views');
	// In development set 'cache' => false so it will be reloaded every time u change a template
	// In production set 'cache' => 'cache' so it will cache templates in cache folder
	$twig = new Twig_Environment($loader, array(
		'cache' => false
	));

	// Filter note: this should be the first config
	$md5filter = new Twig_SimpleFilter('md5', function($string){
		return md5($string);
	});

	$twig->addFilter($md5filter);

	// Default tags u can change them as u like
	$lexer = new Twig_Lexer($twig, array(
		'tag_variable' => array('{{', '}}'),
		'tag_block' => array('{%', '%}')
	));

	$twig->setLexer($lexer);

	// -------------------------------------------------------

	echo $twig->render('index.html', array(
		'name' => 'Mahdy',
		'age'  => 35,
		'users' => array(
			array('name' => 'Max', 'age' => 18),
			array('name' => 'Min', 'age' => 22),
			array('name' => 'Billy', 'age' => 38),
		)
	));