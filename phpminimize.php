<?php
/**
* @package    	phpMinimize()
* @author		Cecil O. Almonte
* @website		https://gist.github.com/cecilomar/6330907
* @copyright	Copyright (C) Cecilomar Design, Inc. 2014
* @license		http://www.gnu.org/licenses/gpl.txt
* @description	Compress HTML, CSS, JS, or combination
* @credits		All over the code. Look for the // Comments
**/
 
function phpMinimize($html){
	// Remove Multiline comments, e.g. // => this type of comments
	// Credits: CRISHK Corporation
	// http://stackoverflow.com/questions/4278739/regular-expression-for-clean-javascript-comments-of-type#answer-4279738
	$html = preg_replace('/(?<!\:)\/\/(.*)\\n/', '', $html);

	// Credits: MaxVandervelde
	// https://gist.github.com/MaxVandervelde/2605283
	preg_match_all('#(<(?:code|pre).*>[^<]+</(?:code|pre)>)#',$html,$excludeTags);
	$html = preg_replace('#<(?:code|pre).*>[^<]+</(?:code|pre)>#', '!!!excludeTag!!!', $html);
	$html = preg_replace('#<!–[^\[].+–>#', '', $html);
	$html = preg_replace('#[\r\n\t]+#', ' ', $html);
	$html = preg_replace('#>[\s]+<#', '><', $html);
	$html = preg_replace('#[\s]+#', ' ', $html);

	// Remove Multiline comments, e.g. /* this type of comments */
	// Credits: chaos
	// http://stackoverflow.com/questions/643113/regex-to-strip-comments-and-multi-line-comments-and-empty-lines#answer-643136
	$html = preg_replace('!/\*.*?\*/!s', '', $html);

	// Remove HTML comments keeping conditional comments or e.g. <!-- This type of comments -->
	// Won't remove this type. <!--[if IE 6]> What is wrong with you? UPGRADE IE! <![endif]-->
	// Credits: Marcio Simao
	// http://stackoverflow.com/questions/11337332/how-to-remove-html-comments-in-php#answer-11337360
	$html = preg_replace('<<!--(?!<!)[^\[>].*?-->>', '', $html);
	
	// Shorten HEX color that can be shortened, e.g. #FFFFFF => #FFF
	// Credits: Avinash Raj
	// http://stackoverflow.com/questions/26332772/regular-expressions-to-search-for-hex-color-codes#answer-26332946
	$hex_char = '[a-f0-9A-F]';
	$html = preg_replace("~#($hex_char)\\1($hex_char)\\2($hex_char)\\3~", '#$1$2$3', $html);

	// Just making sure that there are no double spaces around. I have to check those regex.
	$html = str_ireplace('  ', ' ', $html);

	if($excludeTags[0])
		foreach($excludeTags[0] as $tag)
			$html = preg_replace('/!!!excludeTag!!!/', $tag, $html,1);
	return $html;
}
 
// Compress the output of an entire document:
// 1. Copy or include this script to the begining of a document.
// 2. Uncomment the line below.
 
// ob_start("phpMinimize");
 
?>