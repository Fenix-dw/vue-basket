<?php 
use application\core\Database;

require_once "../application/core/database.php";

$db = new Database();

if($_POST['action'] == "getProducts"){
	echo "dddd";
	
	$rows = $db->getRows('SELECT * FROM products');
	return json_encode($rows);
	// die();
}

if($_POST['action'] == "setProduct"){
	
	$db->insertRow('INSERT INTO products (title, price) VALUE(?,?)', [$_POST['title'], $_POST['price']]);
	echo "Удачное добавление";
	die();
}

