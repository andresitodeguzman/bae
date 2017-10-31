<?php
/*
Product
*/
if(empty($_REQUEST['q'])){
	$product_resulting_table = $mysqli->query("SELECT * FROM product");
} else {
	$q = $_REQUEST['q'];
	$by = "name";
	if(!empty($_REQUEST['by'])) $by = $_REQUEST['by'];
	$product_resulting_table = $mysqli->query("SELECT * FROM product WHERE $by LIKE '%$q%'");
}

$product_array = array();

while($data = mysqli_fetch_array($product_resulting_table)){
	$product_id = $data['product_id'];
	$product_code = $data['product_code'];
	$product_name = $data['name'];
	$product_description = $data['description'];
	$product_subtype_id = $data['product_subtype_id'];
	$product_price = $data['price'];
	$product_available_stocks = $data['available_stocks'];

	$array = array(
	"product_id" => "$product_id",
	"product_code" => "$product_code",
	"product_name" => "$product_name",
	"product_description" => "$product_description",
	"product_subtype_id" => "$product_subtype_id",
	"product_price" => "$product_price",
	"product_available_stocks" => "$product_available_stocks",
	);
	
	array_push($product_array,$array);
}
?>