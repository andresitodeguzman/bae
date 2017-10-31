<?php
/*Types*/
$subtypes_resulting_table = $mysqli->query("SELECT * FROM product_subtype");
$subtypes_array = array();

if(!empty($subtypes_resulting_table)){

	while($data = mysqli_fetch_array($subtypes_resulting_table)){
		$product_subtype_id = $data['product_subtype_id'];
		$name = $data['name'];
		$description = $data['description'];
		$product_type_id = $data['product_type_id'];

		$product_type_name = "";

		foreach($types_array as $type){
			
			if($product_type_id == $type['product_type_id']){
				$product_type_name = $type['name'];
			}

		}

		$array = array(
			"product_subtype_id" => "$product_subtype_id",
			"name" => "$name",
			"description" => "$description",
			"product_type_id" => "$product_type_id",
			"product_type_name" => "$product_type_name"
		);
		array_push($subtypes_array,$array);
	}

}

?>