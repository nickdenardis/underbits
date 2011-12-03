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

/**
 * Fix magic quotes if on.
 *
 */
if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
    // Create lamba style unescaping function (for portability)
    $quotes_sybase = strtolower(ini_get('magic_quotes_sybase'));
    $unescape_function = (empty($quotes_sybase) || $quotes_sybase === 'off') ? 'stripslashes($value)' : 'str_replace("\'\'","\'",$value)';
    $stripslashes_deep = create_function('&$value, $fn', '
        if (is_string($value)) {
            $value = ' . $unescape_function . ';
        } else if (is_array($value)) {
            foreach ($value as &$v) $fn($v, $fn);
        }
    ');
    
    // Unescape data
    $stripslashes_deep($_POST, $stripslashes_deep);
    $stripslashes_deep($_GET, $stripslashes_deep);
    $stripslashes_deep($_COOKIE, $stripslashes_deep);
    $stripslashes_deep($_REQUEST, $stripslashes_deep);
}

/**
 * Return HTML friendly text
 *
 */
function h($text){
	return htmlspecialchars(stripslashes($text));
}
?>