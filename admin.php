<?php

session_start();

if(isset($_POST['pwd']) && '9c02e2732e03edd5cd0782a3c807300b836f8ae9' == hash('sha1', $_POST['pwd'])) {
	$_SESSION['secured'] = 1;
}
if(isset($_GET['logout'])) {
	$_SESSION['secured'] = 0;
}

if(!isset($_SESSION['secured']) || 1 != $_SESSION['secured']) {
	$secured = false;
}
else {
	$secured = true;
}

if($secured) {
	
	require_once('libraries.php');
	
	if(isset($_POST['add'])) {
		$text = htmlentities($_POST['text']);
		$link = htmlentities($_POST['link']);
		
		if(isset($_POST['new_category']) && !empty($_POST['new_category'])) {
			$category = htmlentities($_POST['new_category']);
		}
		else {
			$category = htmlentities($_POST['category']);
		}
		
		if(empty($category)) {
			addItem($text, $link);
		} else {
			addItem($text, $link, $category);
		}
	}
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
<?php if($secured) { ?>
	<form action="admin.php" method="post" ?>
		<input type="text" name="text" placeholder="Text">
		<input type="text" name="link" placeholder="URL">
		<select name="category">
			<option value="">Choose or new category</option>
	<?php foreach (array_keys(getItems()) as $i_category) { ?>
			<option><?php echo $i_category; ?></option>
	<?php } ?>
		</select>
		<input type="text" name="new_category" placeholder="New Category">
		<input type="submit" value="Add" name="add">
	</form>
<?php } else { /* not $secured */ ?>
	<form action="admin.php" method="post">
		<input type="password" name="pwd" placeholder="Password">
		<input type="submit" value="Connect">
	</form>
<?php } ?>
	<hr />
	<footer><a href="autobot.php" target="_blank">Autobot</a> | <a href="home.php">Home</a> | <a href="admin.php?logout">Logout</a></footer>
</body>
</html>
