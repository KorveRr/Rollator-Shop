<?php
require 'cart.php';
session_start();

$content = '
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
  	<meta name="description" content="Rollator webshop opdracht" />
  	<meta name="keywords" content="Rollators" />
  	<meta name="author" content="Jesse Korver" />
	<title>Rollatorshop - Home</title>
	<link rel="stylesheet" href="./styles/main.css" media="screen">
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
	
	<section>
		<article>
			<p>OldPeople introduceert de nieuwste rollator. De Rollz Motion. Het is een rollator die inspireerd om door te gaan. En geeft je de mogelijkheid door te gaan naar de toekomst.</p>
			<p>Veilig | Innovatieve trommelremmen voor veilig en gedoseerd remmen</p>
			<p>Stabiel | Stabiel en ondersteund rechtop lopen tussen de in hoogte verstelbare en ergonomische handgrepen.</p>
			<p>Compact | De Rollz Motion is eenvoudig opvouwbaar tot een compact pakket.</p>
			<p>Confortabel | Rijcomfort en natuurlijke vering in de schuimgevulde achterbanden.</p>
			<p>Wendbaar | Licht rijgemak en gemakkelijk manouvreren met de wendbare voorwielen.</p>
			<p>Prettig | Uitrusten op een prettig zitkussen.</p>
			<p>Gemak |  Gemakkelijk over drempels en stoepen met de drempelhulp.</p>
		</article>
		<aside></aside>
	</section>
	<div class="line"></div>
	<section>
		'.newProducts().'
	</section>
	<div class="line"></div>
	<section>
		<article>
		<img src="http://www.safe2shop.nl/media/beeldmerkzegel100x100.gif" alt="veilig winkelen" />
		</article>
		<article>
		</article>
		<article>
		<iframe width="260" height="155" src="http://www.youtube.com/embed/YpxQtwN1KzU" frameborder="0" allowfullscreen></iframe>
		</article>
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