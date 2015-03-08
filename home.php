<?php

/**
 *  Espace d'affichage des menus
 */

require_once('libraries.php');

$items = getItems();

?>
<html><head><title>Menuteur</title>
<style>
	body { /* Dotted background stolen from http://codepen.io/aleprieto/pen/nAmIy */ background-image: -webkit-repeating-radial-gradient(center center, rgba(0,0,50,.2), rgba(0,0,50,.2) 1px, transparent 1px, transparent 100%); background-image: -moz-repeating-radial-gradient(center center, rgba(0,0,50,.2), rgba(0,0,50,.2) 1px, transparent 1px, transparent 100%); background-image: -ms-repeating-radial-gradient(center center, rgba(0,0,50,.2), rgba(0,0,50,.2) 1px, transparent 1px, transparent 100%); background-image: repeating-radial-gradient(center center, rgba(0,0,50,.2), rgba(0,0,50,.2) 1px, transparent 1px, transparent 100%); -webkit-background-size: 3px 3px; -moz-background-size: 3px 3px; background-size: 3px 3px; }
	h1 { font-family: cursive; text-align: center; }
	.menu { display: inline-block; min-width: 15ex; font-size: 200%; list-style: none; vertical-align: top; }
	.menu a { display: block; padding: 2px; padding-right: 16px; border-right: 0px solid hsl(240, 50%, 50%); border-bottom: 1px solid #001100; color: blue; text-decoration: none; transition: all ease-in-out 0.2s; }
	.menu li:last-child a { border-bottom: transparent; }
	.menu a:hover { border-right-width: 10px; padding-right: 6px; }
</style>
</head><body>
	<header>
		<h1>Menuteur</h1>
	</header>
	
	<nav>
		<ul class="menu" id="shortcuts">
			<li><a href="home.php">Home</a></li>
			<li><a href="admin.php">Admin</a></li>
		</ul>
<?php foreach($items as $i_category => $i_items_categorie) { ?>
		<ul class="menu" id="<?php echo $i_category; ?>">
<?php 	foreach($i_items_categorie as $i_item) { ?>
			<li><a href="<?php echo $i_item['link']; ?>"><?php echo $i_item['text']; ?></a></li>
<?php 	} ?>
		</ul>
<?php } ?>
	</nav>
	<hr />
	<footer><a href="autobot.php" target="_blank">Autobot</a></footer>
</body>
</html>
