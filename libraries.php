<?php

/**
 *  Fichier contenant les fonctions et autres outils
 */

define('DATAFILE', 'menuteurdata.mydat');

function getItems() {
	
	if(!file_exists(DATAFILE)) return array();
	
	$items = unserialize(file_get_contents(DATAFILE));
	
	return $items;
}

function addItem($text, $link, $category = 'default') {
	
	$items = getItems();
	
	if(!isset($items[$category])) {
		$items[$category] = array();
	}
	$items[$category][] = array(
		'text' => $text,
		'link' => $link,
	);
	
	file_put_contents(DATAFILE, serialize($items));
}
