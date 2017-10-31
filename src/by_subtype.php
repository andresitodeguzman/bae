<?php
/*
Product by Subtype
*/

// Start Session
session_start();

// Include Secure File
include("_system/secure.php");

// Include Config File
include("_system/config.php");

// Include Secure File
include("_system/connection.php");

// Activity Title
$activity_title = "Products by Subtype";

// Include DB Getters
include("_prepare/types.php");
include("_prepare/subtypes.php");
include("_prepare/products.php");

?>
<!Doctype html>
<html lang="en">
	<head>
		<title><?php echo $activity_title. " - " .$site_name; ?></title>
		<?php include("_system/styles.php"); ?>
	</head>
	<body>
		<?php include("_contents/navbar.php"); ?>
		<div class="container">
		<br><br>
		<form>
			<div class="row">
				<div class="col s6">
					<div class="input-field">
						<input type='text' name='q' id='q' value='<?php if(!empty($_REQUEST['q'])) echo $_REQUEST['q']; ?>'>
						<label for='q'>Search</label>
					</div>
				</div>
				<div class="col s4">
					<div class="input-field">
						<select name="by">
							<option value='name'>Name</option>
							<option value='product_code'>Code</option>
							<option value='available_stocks'>Available Stocks</option>
							<option value='price'>Price</option>
						</select>
						<label>By</label>
					</div>
				</div>
				<div class="col s2">
					<button type='submit' class='btn-large yellow waves-effect waves-light hoverable black-text'><i class='material-icons'>search</i></button>
				</div>
			</div>
		</form>
		<br>
		<?php
			foreach($types_array as $type){
				$type_name = $type['name'];
				$type_id = $type['product_type_id'];
				echo "
					<h3 class='grey-text darken-2'><b>$type_name</b></h3><br>
				"; 
				foreach($subtypes_array as $subtype){
					$st_pdct_id = $subtype['product_type_id'];
					if($st_pdct_id == $type_id){
						$subtype_name = $subtype['name'];
						$subtype_id = $subtype['product_subtype_id'];
						
						echo "
						<h5>$subtype_name</h5>
						
						<table border = 1 class='responsive-table highlight striped bordered'>
							<tr class='w3-blue'>
								<td>ID</td>
								<td>Code</td>
								<td>Name</td>
								<td>Description</td>
								<td>Price</td>
								<td>Available Stocks</td>
							</tr>
						";
						foreach($product_array as $product){
							$p_st_id = $product['product_subtype_id'];
							if($p_st_id == $subtype_id){
								$product_id = $product['product_id'];
								$product_code = $product['product_code'];
								$product_name = $product['product_name'];
								$product_description = $product['product_description'];
								$product_price = $product['product_price'];
								$product_available_stocks = $product['product_available_stocks'];
								
								echo "
								<tr>
									<td>$product_id</td>
									<td>$product_code</td>
									<td>$product_name</td>
									<td>$product_description</td>
									<td>$product_price</td>
									<td>$product_available_stocks</td>
								</tr>
								";
								
							}
						}
						
						echo "</table><br><br>";
					}
				}
			}
		?>
		</div><br><br><br><br>
	</body>
</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
	$('select').material_select();
});
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

