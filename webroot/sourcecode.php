<?php
	include(__DIR__.'/config.php');
	include('../src/CSource.php');

	// Add style for csource
	$masun['stylesheets'][] = 'css/source.css';

	// Create the object to display sourcecode
	//$source = new CSource();
	$source = new CSource(array('secure_dir' => '..', 'base_dir' => '..'));

	// Do it and store it all in variables in the Anax container.
	$masun['title'] = "Visa källkod";
	$masun['main'] = "<h1>Visa källkod</h1>\n" . $source->View();
	
	include(MASUN_THEME_PATH);
