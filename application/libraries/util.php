<?php

spl_autoload_register(function ($path) {

	$path  = str_replace('\\','/',$path);
	$paths = explode('/', $path);

    	if (preg_match('/controllers/',strtolower($paths[1]))) {
        	$paths[1] = 'controllers';
    	} else if (preg_match('/models/',strtolower($paths[1]))) {
        	$paths[1] = 'models';
    	}
	$loadFile =  $paths[0].'/'.$paths[1].'/'.$paths[2].'.php';
	require_once $loadFile;
});


?>

