<?php
/**
 * Autoload classes (no need to include them one by one)
 *
 * @param $className string
 */
if (!function_exists('UnderAutoload')){
	function UnderAutoload($class){
		// Format the class name without the namespace
		$unnamespaced = end(explode('\\', strtolower($class)));
		
		// Check to see if this class is part of Underbits
		if (is_file(DIR_ROOT . 'lib/class.' . $unnamespaced . '.php'))
			include_once(DIR_ROOT . 'lib/class.' . $unnamespaced . '.php');
			
		// Check to see if this class is part of the Application
		else if (defined('DIR_CLASSES') && is_file(DIR_CLASSES . strtolower($class) . '.php'))
			include_once(DIR_CLASSES . strtolower($class) . '.php');
	}
}

spl_autoload_register('UnderAutoload');
?>