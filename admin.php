<?php

require_once('libraries.php');

if(isset($_POST['add'])) {
	$text = $_POST['text'];
	$link = $_POST['link'];
	
	addItem($text, $link);
}

/**
 *  Espace d'administration des menus
 */

?>
<html><head><title>Menuteur</title>
<style>
	body { /* Dotted background stolen from http://codepen.io/aleprieto/pen/nAmIy */ background-image: -webkit-repeating-radial-gradient(center center, rgba(0,0,50,.2), rgba(0,0,50,.2) 1px, transparent 1px, transparent 100%); background-image: -moz-repeating-radial-gradient(center center, rgba(0,0,50,.2), rgba(0,0,50,.2) 1px, transparent 1px, transparent 100%); background-image: -ms-repeating-radial-gradient(center center, rgba(0,0,50,.2), rgba(0,0,50,.2) 1px, transparent 1px, transparent 100%); background-image: repeating-radial-gradient(center center, rgba(0,0,50,.2), rgba(0,0,50,.2) 1px, transparent 1px, transparent 100%); -webkit-background-size: 3px 3px; -moz-background-size: 3px 3px; background-size: 3px 3px; }
	h1 { font-family: cursive; text-align: center; }
</style>
</head><body>
	<header>
		<h1>Menuteur Admin</h1>
	</header>
	<form action="admin.php" method="post" ?>
		<input type="text" name="text" placeholder="Text">
		<input type="text" name="link" placeholder="URL">
		<input type="submit" value="Add" name="add">
	</form>
	<hr />
	<footer><a href="autobot.php" target="_blank">Autobot</a> | <a href="home.php">Home</a></footer>
</body>
</html>
