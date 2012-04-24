<?php
require 'pages/cart.php';

$content = '
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
  	<meta name="description" content="Rollator webshop opdracht" />
  	<meta name="keywords" content="Rollators" />
  	<meta name="author" content="Jesse Korver" />
	<title>Rollatorshop - Winkelwagen</title>
	<link rel="stylesheet" href="./styles/main.css" media="screen">
	<link rel="stylesheet" href="./styles/cart.css" media="screen">
</head>
<body>
	<header>
		<nav>
			<ul>
			<li><a href="home">Home</a></li>
			<li><a href="producten">Producten</a></li>
			<li><a href="contact">Contact</a></li>
			<li><a href="winkelwagen">Winkelwagen</a></li>
			<li><a href="faq">FAQ</a></li>
			</ul>
		</nav>
	</header>
<div id="wrapper">
	<h2>Winkelwagen:</h2>
	<section>
		'.cart().'
	</section>
	<footer>
	<div id="copy">Copyright © 2012 - OldPeople <a href="algemenevoorwaarden">Algemene Voorwaarden</a></div>
		<nav>
			<ul>
			<li><a href="home">Home</a></li>
			<li><a href="producten">Producten</a></li>
			<li><a href="contact">Contact</a></li>
			<li><a href="winkelwagen">Winkelwagen</a></li>
			<li><a href="faq">FAQ</a></li>
			</ul>
		</nav>
	</footer>
</div>
</body>
';
?>