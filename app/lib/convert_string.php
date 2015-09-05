<?php
Class Convert_string{
    static function cut($string, $length=400){
        $string = htmlspecialchars_decode(stripslashes($string));
        if (strlen($string) > $length) {
            // truncate string
            $stringCut = substr($string, 0, $length);
            // make sure it ends in a word so assassinate doesn't become ass...
            $string = substr($stringCut, 0, strrpos($stringCut, ' '))." ...";
        }
        $string = preg_replace("/<\/?div[^>]*\>/i", "", $string);
        return $string;
        
	}
    
    static function sluggify($url){
		# Prep string with some basic normalization
		$url = strtolower($url);
		$url = strip_tags($url);
		$url = stripslashes($url);
		$url = html_entity_decode($url);
	
		# Remove quotes (can't, etc.)
		$url = str_replace('\'', '', $url);
	
		# Replace non-alpha numeric with hyphens
		$match = '/[^a-z0-9]+/';
		$replace = '-';
		$url = preg_replace($match, $replace, $url);
	
		$url = trim($url, '-');
	
		return $url;
	}
	
	static function tosmall($url){
		$url = strtolower($url);
		return $url;
	}
    
}

?>