<?php
$supplier_resulting_table = $mysqli->query("SELECT * FROM `supplier`");

$supplier_array = array();

if(!empty($supplier_resulting_table)){
	
	while($data = mysqli_fetch_array($supplier_resulting_table)){
		$supplier_id = $data['supplier_id'];
		$supplier_name = $data['supplier_name'];
		$supplier_description = $data['supplier_description'];
		$supplier_address = $data['supplier_address'];
		$supplier_contact = $data['supplier_contact'];
		
		$array = array(
			"supplier_id" => "$supplier_id",
			"supplier_name" => "$supplier_name",
			"supplier_description" => "$supplier_description",
			"supplier_address" => "$supplier_address",
			"supplier_contact" => "$supplier_contact",
		);

		array_push($supplier_array,$array);
	}
	
}

?>