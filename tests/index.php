<?php
	function h($text){
		return 'H: ' . htmlspecialchars(stripslashes($text));
	}

	function RunTest($results, $expected){
		return ($results == $expected);
	}
	
	include_once('../underbits.php');
		
	echo '<h2>Setup:</h2>';
	
	$myUB->p(DIR_ROOT);
	$myUB->p('"'. __NAMESPACE__. '"');
	
	$myUB->p($myUB);
	
	$myUB->p($myUB->h('Testing'));
	$myUB->p(h('Testing'));
?>