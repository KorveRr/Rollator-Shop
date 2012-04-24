<?php
header("HTTP/1.0 404 Not Found");

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
	<h2>Pagina niet gevonden...</h2>
	<h4>Dit komt mogelijk door één van de volgende redenen:</h4>
	<p>De pagina bestaat niet.</p>
	<p>De pagina is verplaatst naar een nieuwe locatie.</p>
	<p>Er wordt nu aan de pagina gewerkt, en is tijdelijk offline gehaald.</p>
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