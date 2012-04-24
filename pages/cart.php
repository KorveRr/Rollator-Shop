<?php
require './classes/connect.php';
require './classes/Url.php';
require './classes/root.php';

session_start();
$url = new Url;
$page = $url->root.'winkelwagen';



if (isset($_GET['add'])){
	$quantity = mysql_query('SELECT id, quantity FROM products WHERE id='.mysql_real_escape_string((int)$_GET['add']));
	while ($quantity_row = mysql_fetch_assoc($quantity)) {
		if ($quantity_row['quantity']!=$_SESSION['cart_'.(int)$_GET['add']])	{
			$_SESSION['cart_'.(int)$_GET['add']]+='1';
		}
	}
	header ('Location: '.$page);
}

if (isset($_GET['remove'])){
	$_SESSION['cart_'.(int)$_GET['remove']]--;
	header ('Location: '.$page);
}

if (isset($_GET['delete'])){
	$_SESSION['cart_'.(int)$_GET['delete']]='0';
	header ('Location: '.$page);

}

function newProducts() {
	$return = '';
	$get = mysql_query('SELECT id, name, description, img, price FROM products WHERE quantity > 0 ORDER BY id DESC LIMIT 3');
	if (mysql_num_rows($get) ==0){
		$return .= "Er zijn geen producten";
	}

	else {
		while ($get_row = mysql_fetch_assoc($get)) {
			$return .= '<article>'.$get_row['name'].'<p>'.$get_row['description'].'</p><a href="'.$root.'producten/'.$get_row['id'].'"><img src="'.$get_row['img'].'" alt="product" /></a>&euro;'.number_format($get_row['price'], 2).' <a href="cart/?add='.$get_row['id'].'">Toevoegen</a></article>';
		}
	}
	return $return;
}

function products() {

	$data = prepareArray();

	$return = '';
	$cats = mysql_query("SELECT * FROM categories");
	$get = mysql_query('SELECT * FROM products WHERE quantity > 0 ORDER BY id DESC');


	if(mysql_num_rows($get) !=0) {
		while($row = mysql_fetch_assoc($cats)){
			$data['cats'][] = $row;
		}

		while ($get_row = mysql_fetch_assoc($get)) {
			/*$return .= '<article>'.$get_row['name'].'<p>'.$get_row['description'].'</p><a href="producten/'.$get_row['id'].'"><img src="'.$get_row['img'].'" alt="product" /></a>&euro;'.number_format($get_row['price'], 2).' <a href="cart/?add='.$get_row['id'].'">Toevoegen</a></article>';*/

			$data['products'][] = $get_row;
		}

		$return = $data;
	}
	return $return;
}

function getProducts(){
	
	$data = products();
	$return = '';
	foreach($data['cats'] as $key => $value){
		$return.= '<h2>'.$value['categorie_name'].'</h2>';
		
		foreach($data['products'] as $k => $v){
			if($value['categorie_id'] == $v['categorie_id']){
				$return.= '<article>'.$v['name'].'<p>'.$v['description'].'</p><a href="producten/'.$v['id'].'"><img src="'.$v['img'].'" alt="product" /></a>&euro;'.number_format($v['price'], 2).' <a href="cart/?add='.$v['id'].'">Toevoegen</a></article>';
			}
		}
		
	}
	return $return;
}

function prepareArray(){
	$data = array('cats' => array(),
					'products' => array());
	return $data;
}


function getOrderid(){
	$query = mysql_query('SELECT order_id FROM bestellingen ORDER BY order_id DESC LIMIT 1');
	if(mysql_num_rows($query)==0){
		$orderid = 1;
	}
	else{
		$row = mysql_fetch_assoc($query);
		$orderid = $row['order_id'] + 1;
	}
	return $orderid;
}

function cart() {
	$return = '';
	foreach($_SESSION as $name => $value){
		if ($value>0){
			if (substr($name, 0, 5)=='cart_'){
				$id = substr($name, 5, (strlen($name)-5));
				$get = mysql_query("SELECT id, name, price FROM products WHERE id='".mysql_real_escape_string((int)$id)."'");
				while ($get_row = mysql_fetch_assoc($get)){
					$sub = $get_row['price']*$value;
					$return.='<table><th>Product</th><th>Aantal</th><th>Bedrag</th><th>Totaal</th><tr><td>'.$get_row['name'].'</td><td>'.$value.'</td><td>&euro;'.number_format($get_row['price'], 2).'</td><td>&euro;'.number_format($sub, 2).'</td><td><a href="cart/?remove='.$id.'">[-]</a></td><td><a href="cart/?add='.$id.'">[+]</a></td><td><a href="cart/?delete='.$id.'">[Verwijderen]</a></td></tr></table>';
				}
			}
			$total += $sub;
		}
		
	}
	$_SESSION['order_amount'] = number_format($total, 2); 
	$_SESSION['order_description'] = 'Bestelling afronden';	
	$_SESSION['order_id'] = getOrderid();	

	if ($total==0){
		$return .= "U heeft nog geen producten in uw winkelmand.";
	}

	else{
		$return .= '<form action="ideal/step1.php" method="post">
		<input type="hidden" name="order_amount" value="'.number_format($total, 2).'">
		<input type="hidden" name="order_description" value="Bestelling">
		<input type="submit" value="bestellen"> 
		</form>';
	}
	return $return;
}

?>