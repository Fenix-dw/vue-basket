<?php 
use application\core\Database;

require_once "../application/core/database.php";

$db = new Database();

if(isset($_POST['action'])){
	if($_POST['action'] == "checkout"){
		$db->insertRow('INSERT INTO orders (products) VALUE(?)', [$_POST['products']]);
		die();
	}

	if($_POST['action'] == "changeProduct"){
		$db->updateRow('UPDATE products SET quantity=? WHERE id = ?', [$_POST['quantity'], $_POST['id']]);
		die();
	}

	if($_POST['action'] == "deleteProduct"){
		$db->deleteRow('DELETE FROM products WHERE id = ?', [$_POST['id']]);
		die();
	}

	if($_POST['action'] == "deleteProducts"){
		$db->deleteRow('DELETE FROM products');
		die();
	}

	if($_POST['action'] == "getProducts"){
		$rows = $db->getRows('SELECT * FROM products');
		echo json_encode($rows);
		die();
	}

	if($_POST['action'] == "setProduct"){
		
		$db->insertRow('INSERT INTO products (title, price) VALUE(?,?)', [$_POST['title'], $_POST['price']]);
		echo "Удачное добавление";
		die();
	}
}