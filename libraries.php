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

function addItem($text, $link) {
	
	$items = getItems();
	
	$items[] = array(
		'text' => $text,
		'link' => $link,
	);
	
	file_put_contents(DATAFILE, serialize($items));
}
