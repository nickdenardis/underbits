<?php
	function h($text){
		return 'H: ' . htmlspecialchars(stripslashes($text));
	}

	function RunTest($results, $expected){
		return ($results == $expected);
	}
	
	include_once('../underbits.php');
		
	echo '<h2>Setup:</h2>';
	
	$myUB->p('DIR_ROOT: ' . DIR_ROOT);
	$myUB->p('Namespace: "'. __NAMESPACE__. '"');
	
	$myUB->p($myUB);
	
	$myUB->p($myUB->h('Testing'));
	$myUB->p(h('Testing'));
	
	if(get_magic_quotes_gpc()){
   		echo 'Magic Quotes are On! Please turn off if possible';
    }
    
    echo '<pre>';
	debug_print_backtrace();
	echo '</pre>';
?>