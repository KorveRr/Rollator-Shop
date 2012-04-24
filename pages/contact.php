<?php
if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text']))
{
	$contact_name = htmlspecialchars($_POST['contact_name']);
	$contact_email = htmlspecialchars($_POST['contact_email']);
	$contact_text = htmlspecialchars($_POST['contact_text']);

	if (!empty($contact_name) && !empty($contact_email) && !empty($contact_text))
	{
		if (strlen($contact_name)>25 || strlen($contact_email)>50 || strlen($contact_text)>1000)
		{
			$message = 'Sorry, u gebruikt te veel Characters.';
		} else{
		$to = 'originaljessee@hotmail.com';
		$subject = 'Contact form submitted.';
		$body = $contact_name."\n".$contact_text;
		$headers = 'From: '.$contact_email;

		if (@mail($to, $subject, $body, $headers))
		{
			$message = 'Bedankt voor uw mail. Er zal zo spoedig mogelijk worden gereageerd';

		} else {
			$message = 'Sorry er ging iets mis. Probeer het later nog een keer.';
		}
}
	} else {
		$message = 'All fields are required.';
	}
}


$content .= '
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
  	<meta name="description" content="Rollator webshop opdracht" />
  	<meta name="keywords" content="Rollators" />
  	<meta name="author" content="Jesse Korver" />
	<title>Rollatorshop - Contact</title>
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
	<form action="contact" method="POST">
					Email address:<br><input type="text" name="contact_email" maxlength="50"><br /><br />
					Onderwerp:<br /><input type="text" name="contact_name" maxlength="25"><br /><br />
					Bericht<br />
					<textarea name="contact_text" rows="12" cols="60" maxlength="1000"></textarea><br /><br />
					<input type="submit" value="Versturen">
	</form>
	<h2>'.$message.'</h2>
	<div id="contactinfo">
<p>Contact Info:</p>
<p>OldPeople B.V.</p>
<p>Wielingenweg 67</p>
<p>1826 BD Alkmaar</p>
<p>+31 (0) 72 5621096</p>

<p>Algemene informatie over producten:
contact@oldpeople.com</p>
</p>
</div>
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