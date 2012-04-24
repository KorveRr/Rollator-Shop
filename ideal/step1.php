<?php
require '../classes/connect.php';
require '../classes/root.php';

session_start();
	// Opvragen van order informatie.
	$sOrderId = rand(1000000, 9999999); // Uniek order ID
	$sOrderDescription = 'Order omschrijving'; // Omschrijving
	$fOrderAmount = rand(100, 99999) / 100; // Bedrag (in decimaal!!)

if ($_POST['submit'])
{
	$voornaam = htmlspecialchars($_POST['order_name']);
	$achternaam = htmlspecialchars($_POST['order_surname']);
	$email = htmlspecialchars($_POST['order_email']);
	$postcode = htmlspecialchars($_POST['order_postcode']);
	$straat = htmlspecialchars($_POST['order_straat']);
	$straatnr = htmlspecialchars($_POST['order_straatnr']);
	$tel = htmlspecialchars($_POST['order_tel']);
	
	if ($voornaam&&$achternaam&&$email&&$postcode&&$straat&&$straatnr&&$tel)
	{
		$insert = mysql_query("INSERT INTO klanten 
											VALUES(
												'',
												'".$voornaam."',
												'".$achternaam."',
												'".$email."',
												'".$postcode."',
												'".$straat."',
												'".$straatnr."',
												'".$tel."',
												NOW()
												)"
								);

		$klantid = mysql_insert_id();
		
		$insert .= mysql_query("INSERT INTO bestellingen 
											VALUES(
												'".$_SESSION['order_id']."',
												'".$klantid."',
												'NOW()',
												'0',
												'".$_SESSION['order_description']."',
												'".$_SESSION['order_amount']."'
												)"
								);
								
		if(!$insert){
		
			echo mysql_error();
		}
		else{
			header("Location: step2.php");
		}
		
	}
	else 
	echo "Vul alle velden in";
}



$content = '
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="description" content="Rollator webshop opdracht" />
  	<meta name="keywords" content="Rollators" />
  	<meta name="author" content="Jesse Korver" />
  	<meta name="copyright" content="Jesse Korver" />
	<title>Rollatorshop - Samenstellen van een order</title>
	<link rel="stylesheet" href="'.$root.'styles/main.css" media="screen">
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
			<li><a href="'.$root.'algemenevoorwaarden">Algemene Voorwaarden</a></li>
			<ul>
		</nav>
	</header>
	<div id="wrapper">
	<section>
		<form action="step1.php" method="post">
			Voornaam:<br /><input type="text" name="order_name"><br />
			Achternaam:<br /><input type="text" name="order_surname"><br />
			Email:<br /><input type="text" name="order_email"><br />
			Postcode:<br /><input type="text" name="order_postcode"><br />
			Straat:<br /><input type="text" name="order_straat"><br />
			Huisnummer:<br /><input type="text" name="order_straatnr"><br />
			Telefoonnummer:<br /><input type="text" name="order_tel"><br />
			<input type="submit" name="submit" value="Bestellen">
		</form>
	</section>
	<footer>
		<nav>
			<ul>
			<li><a href="'.$root.'home">Home</a></li>
			<li><a href="'.$root.'producten">Producten</a></li>
			<li><a href="'.$root.'contact">Contact</a></li>
			<li><a href="'.$root.'winkelwagen">Winkelwagen</a></li>
			<li><a href="'.$root.'faq">FAQ</a></li>
			<ul>
		</nav>
	</footer>
</div>
</body>
';

echo $content;

?>