<?php
	include 'classes/cleanUrl.php';
	require 'classes/connect.php';

	$c = new cleanUrl;
	
	if(empty($c->url[0]) || $c->url === 'index.php'){
		$page = 'home';
	}
	else{
		switch($c->url[0]){
		
		case 'home';
			$page = 'home';
		break;

		case 'producten':
			$page = 'producten';
		break;

		case 'contact':
			$page = 'contact';
		break;

		case 'winkelwagen':
			$page = 'winkelwagen';
		break;

		case 'faq':
			$page = 'faq';
		break;

		case 'cart':
			$page = 'cart';
		break;

		case 'algemenevoorwaarden':
			$page = 'algemenevoorwaarden';
		break;

		default:
			$page = '404';
		break;
		}
	}
	
	function webPage($page){
		$filepath = 'pages/';
		$file = $page.'.php';

		if(!empty($page)){
			if(file_exists($filepath.$file)){
				require 'pages/'.$page.'.php';
				echo $content;
			}
			else{
				header("HTTP/1.0 404 not found");
			}
		
		}
	}

	webPage($page);
	/*echo '<pre>';
	print_r($c->url);*/s

?>