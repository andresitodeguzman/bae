<?php
/*
Index
*/

// Include Site Config
include("_system/config.php");

// Include DB Connection
include("_system/connection.php");

$all_products = mysql_query("SELECT * FROM product");
?>
<!Doctype html>
<html>
	<head>
		<title><?php echo $site_title; ?></title>
	</head>
	<body>
	Products
	<?php
		while($data = mysql_fetch_object($all_products)){

			$product_id = $data->product_id;
			$product_code = $data->product_code;
			$name = $data->name;
			$description = $data->description;
			$product_subtype_id = $data->product_subtype_id;
			$price = $data->price;
			$available_stocks = $data->available_stocks;
			$user_id = $data->user_id;

			echo $product_id."<br>";
			echo $product_code."<br>";
			echo $name."<br>";
			echo $description."<br>";
			echo $product_subtype_id."<br>";
			echo $price."<br>";
			echo $available_stocks."<br>";
			echo $user_id."<br>";
		}
	?>
	</body>
</html>