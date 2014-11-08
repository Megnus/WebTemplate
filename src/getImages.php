<?php
	$filenameArray = [];

	$handle = opendir('../webroot/img/carousel');

	while ($file = readdir($handle))
	{
		if (preg_match('/.jpg/', $file) || preg_match('/.gif/', $file) || preg_match('/.tiff/', $file) || preg_match('/.png/', $file)) 
		{
			array_push($filenameArray, $file);
		}
	}

	echo json_encode($filenameArray);
?>