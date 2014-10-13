<?php

/*

This is my original project. I wish to develop it further, so I'm moving it to GitHub.
The original URL is: https://gist.github.com/cecilomar/6330907

*/

/**
* @package    	compressHTML()
* @author		Cecil O. Almonte
* @website		https://gist.github.com/cecilomar/6330907
* @copyright	Copyright (C) Cecilomar Design, Inc. 2013
* @license		http://www.gnu.org/licenses/gpl.txt
* @description	Compress HTML, CSS, JS, or combination
* @thanks		https://gist.github.com/MaxVandervelde/2605283
**/
 
function compressHTML($html){
    preg_match_all('#(<(?:code|pre).*>[^<]+</(?:code|pre)>)#',$html,$excludeTags);
	$html = preg_replace('#<(?:code|pre).*>[^<]+</(?:code|pre)>#', '!!!excludeTag!!!', $html);
	$html = preg_replace('#<!–[^\[].+–>#', '', $html);
	$html = preg_replace('#[\r\n\t]+#', ' ', $html);
	$html = preg_replace('#>[\s]+<#', '><', $html);
	$html = preg_replace('#[\s]+#', ' ', $html);
	// http://stackoverflow.com/questions/643113/regex-to-strip-comments-and-multi-line-comments-and-empty-lines
	$html = preg_replace('!/\*.*?\*/!s', '', $html);
	// http://stackoverflow.com/questions/11337332/how-to-remove-html-comments-in-php
	$html = preg_replace('<<!--(?!<!)[^\[>].*?-->>', '', $html);
	if($excludeTags[0])
		foreach($excludeTags[0] as $tag)
			$html = preg_replace('/!!!excludeTag!!!/', $tag, $html,1);
	return $html;
}
 
// Compress the output of an entire document:
// 1. Copy or include this script to the begining of a document.
// 2. Uncomment the line below.
 
// ob_start("compressHTML");
 
?>