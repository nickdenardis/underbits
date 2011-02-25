<?php
namespace Underbits;
	
class Utilities {
	/**
	 * Display text from DB in HTML safe format
	 *
	 * @param $text String
	 * @return string
	 */
	public function h($text){
		return htmlspecialchars(stripslashes($text));
	}
	
	/**
	 * Display text or an array in HTML <pre> tags
	 *
	 * @param $text A mixed set, anything with a predefined format
	 * @return null
	 */
	public function p($text, $ip=''){
		$ready = true;
		
		if (is_string($ip) && $ip != '' && $_SERVER['REMOTE_ADDR'] != $ip)
			$ready = false;
		else if (is_array($ip) && !in_array($_SERVER['REMOTE_ADDR'], $ip))
			$ready = false;
		
		if ($ready == true){
			echo '<pre>';
			print_r($text);
			echo '</pre>';
		}
	}
}