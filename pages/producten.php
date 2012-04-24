<?php
session_start();
require 'cart.php';
require './classes/connect.php';
require './classes/root.php';


$c = new cleanUrl;
if(isset($c->url[1]) && $c->url[1] !== ''){
	
	$productselect = mysql_query("SELECT * FROM products WHERE id = '".$c->url[1]."' ") or die(mysql_error);	
	$row = mysql_fetch_array($productselect);
	$aantal = mysql_num_rows($productselect);
	
	if($aantal == 0){
		$product = products();
	}
	else{
		$id = $row['id'];
		$name = $row['name'];
		$description = $row['description'];
		$price = $row['price'];
		$img = $row['img'];
		$text = $row['text'];
		$product = '<div class="uniek"><h2>'.$name.'</h2>';
		$product .= '<img src="'.$img.'"></img>';
		$product .= $text;
		$product .= '<div class="price">&euro;'.number_format($price, 2).'</div> <a href="cart/?add='.$id.'">Toevoegen aan winkelmand</a></div>';
	}
}

elseif(!isset($c->url[1]) && $c->url[1] == ''){
	$product = getProducts();
}


$content = '
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
  	<meta name="description" content="Rollator webshop opdracht" />
  	<meta name="keywords" content="Rollators" />
  	<meta name="author" content="Jesse Korver" />
	<title>Rollatorshop - Home</title>
	<link rel="stylesheet" href="'.$root.'styles/main.css" media="screen">
	<link rel="stylesheet" href="'.$root.'styles/product.css" media="screen">
</head>
<body>
	<header>
		<nav>
			<ul>
			<li><a href="'.$root.'home">Home</a></li>
			<li><a href="'.$root.'producten">Producten</a></li>
			<li><a href="'.$root.'contact">Contact</a></li>
			<li><a href="'.$root.'winkelwagen">Winkelwagen</a></li>
			<li><a href="'.$root.'faq">FAQ</a></li>
			</ul>
		</nav>
	</header>
	<div id="wrapper">
	<section>
		<div class="items">
		'.$product.'
		</div>
	</section>
	<footer>
	<div id="copy">Copyright © 2012 - OldPeople <a href="algemenevoorwaarden">Algemene Voorwaarden</a></div>
		<nav>
			<ul>
			<li><a href="'.$root.'home">Home</a></li>
			<li><a href="'.$root.'producten">Producten</a></li>
			<li><a href="'.$root.'contact">Contact</a></li>
			<li><a href="'.$root.'winkelwagen">Winkelwagen</a></li>
			<li><a href="'.$root.'faq">FAQ</a></li>
			</ul>
		</nav>
	</footer>
</div>
</body>
';
?>