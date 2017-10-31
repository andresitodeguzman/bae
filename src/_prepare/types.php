<?php
/*Types*/
$types_resulting_table = $mysqli->query("SELECT * FROM product_type");

$types_array = array();

if(!empty($types_resulting_table)){

	while($data = mysqli_fetch_array($types_resulting_table)){
		$product_type_id = $data['product_type_id'];
		$name = $data['name'];
		$description = $data['description'];

		$array = array(
			"product_type_id" => "$product_type_id",
			"name" => "$name",
			"description" => "$description"
		);
		array_push($types_array,$array);
	}

}

?>