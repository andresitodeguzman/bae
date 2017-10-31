<?php
/*
Product
*/

// Start Session
session_start();

// Include Secure File
include("_system/secure.php");

// Include Config File
include("_system/config.php");

// Include DB File
include("_system/connection.php");

// Activity Title
$activity_title = "Product";

// Include DB Getters
include("_prepare/types.php");
include("_prepare/subtypes.php");
include("_prepare/products.php");

?>
<!Doctype html>
<html lang="en">
	<head>
		<title><?php echo $activity_title; ?> - <?php echo $site_name; ?></title>
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
				<a class="btn-medium orange waves-effect waves-light hoverable   w3-border w3-border-white  btn modal-trigger" href="#addModal"><i class='material-icons'>add</i></a>
				<a class="btn-medium green waves-effect waves-light hoverable   w3-border w3-border-white  btn modal-trigger" href="product.php"><i class='material-icons'>refresh</i></a>
			<br><br>
			<table border = 1 class=" responsive-table highlight striped bordered">
				<tr  class="w3-blue">
					<td>ID</td>
					<td>Code</td>
					<td>Name</td>
					<td>Description</td>
					<td>Subtype</th>
					<td>Price</td>
					<td>Available Stocks</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			<?php
			foreach($product_array as $product){
				$product_subtype_id = $product['product_subtype_id'];
				$product_subtype_name = "N/A";
				foreach($subtypes_array as $subtype){
					if($subtype['product_subtype_id'] == $product_subtype_id){
						$product_subtype_name = $subtype['name'];
					}
				}
			?>
				<tr>
					<td>
						<?php echo $product['product_id']; ?>
					</td>
					<td>
						<?php echo $product['product_code']; ?>
					</td>
					<td>
						<?php echo $product['product_name']; ?>
					</td>
					<td>
						<?php echo $product['product_description']; ?>
					</td>
					<td>
						<?php echo $product_subtype_name; ?>
					</td>
					<td>
						<?php echo $product['product_price']; ?>
					</td>
					<td>
						<?php echo $product['product_available_stocks'];?>
					</td>
					<td>
						<a class="modal-trigger" href="#productEditModal<?php echo $product['product_id']; ?>"><i class="material-icons">edit</i></a>
					</td>
					<td>
						<a class="red-text" href="process/delete_product.php?id=<?php echo $product['product_id']; ?>"><i class="material-icons">delete</i></a>
					</td>
				</tr>
				<div class="modal modal-fixed-footer" id="productEditModal<?php echo $product['product_id'] ?>">
					<div class="modal-content">
						<h4 class='grey-text'>Edit Product</h4><br>
						<div class="input-field">
							<input type="text" id="codeField<?php echo $product['product_id']; ?>" value="<?php echo $product['product_code']; ?>">
							<label for="codeField<?php echo $product['product_id']; ?>">Code</label>
						</div>
						<div class="input-field">
							<input type="text" id="nameField<?php echo $product['product_id']; ?>" value="<?php echo $product['product_name']; ?>">
							<label for="nameField<?php echo $product['product_id']; ?>">Name</label>
						</div>
						<div class="input-field">
							<input type="text" id="descriptionField<?php echo $product['product_id']; ?>" value="<?php echo $product['product_description']; ?>">
							<label for="descriptionField<?php echo $product['product_id']; ?>">Description</label>
						</div>
						<div class="input-field">
							<select id="subtypeField<?php echo $product['product_id']; ?>">
								<option disabled>--SELECT SUBTYPE--</option>
								<?php
									foreach($subtypes_array as $subtype){
										$st_sel = "";
										$st_id = $subtype['product_subtype_id'];
										$st_name = $subtype['name'];
										if($subtype['product_subtype_id'] == $product['product_subtype_id']){
											$st_sel = "selected";
										}
										echo "<option value='$st_id' $st_sel>$st_name</option>";
									}
								?>
							</select>
						</div>
						<div class="input-field">
							<input type="text" id="priceField<?php echo $product['product_id']; ?>" value="<?php echo $product['product_price']; ?>">
							<label for="priceField<?php echo $product['product_id']; ?>">Price</label>
						</div>
						<div class="input-field">
							<input type="text" id="stocksField<?php echo $product['product_id']; ?>" value="<?php echo $product['product_available_stocks']; ?>">
							<label for="stocksField<?php echo $product['product_id']; ?>">Available Stocks</label>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-action modal-close btn-large blue waves-effect waves-light hoverable  w3-border w3-border-white">Back</a>
						 <a href="#!" onclick="editProduct<?php echo $product['product_id']; ?>()" class="modal-action modal-close btn-large green waves-effect waves-light hoverable   w3-border w3-border-white">Edit</a>
					</div>
				</div>
				<script type="text/javascript">
					//	abc
					function editProduct<?php echo $product['product_id']; ?>(){
						var c<?php echo $product['product_id']; ?> = $("#codeField<?php echo $product['product_id']; ?>").val();
						var n<?php echo $product['product_id']; ?> = $("#nameField<?php echo $product['product_id']; ?>").val();
						var d<?php echo $product['product_id']; ?> = $("#descriptionField<?php echo $product['product_id']; ?>").val();
						var s<?php echo $product['product_id']; ?> = $("#subtypeField<?php echo $product['product_id']; ?>").val();
						var p<?php echo $product['product_id']; ?> = $("#priceField<?php echo $product['product_id']; ?>").val();
						var a<?php echo $product['product_id']; ?> = $("#stocksField<?php echo $product['product_id']; ?>").val();

						if(!c<?php echo $product['product_id']; ?>){
							Materialize.toast("Code is required",3000);
						} else {
							if(!n<?php echo $product['product_id']; ?>){
								Materialize.toast("Name is required",3000);
							} else {
								if(!s<?php echo $product['product_id']; ?>){
									Materialize.toast("Subtype is required",3000);
								} else {
									$.ajax({
										type:'POST',
										cache:false,
										url:'process/edit_product.php?id=<?php echo $product['product_id']; ?>',
										data: {
											product_code: c<?php echo $product['product_id']; ?>,
											name: n<?php echo $product['product_id']; ?>,
											description: d<?php echo $product['product_id']; ?>,
											product_subtype_id: s<?php echo $product['product_id']; ?>,
											product_price: p<?php echo $product['product_id']; ?>,
											available_stocks: a<?php echo $product['product_id'];?>,
										},
										success: function(result){
											Materialize.toast(result,3000);
										}
									}).fail(function(){
										Materialize.toast("An Error Occurred",3000);
									});
								}
							}
						}
					}
				</script>
			<?php } ?>
				</table>
				<br><br><br><br>
		</div>
	</body>

<!-- Modals -->
<div class="modal modal-fixed-footer" id="addModal">
	<div class="modal-content">
		<h4 class="grey-text">Add Product</h4><br>
		<div class="input-field">
			<input type="text" id="productCode">
			<label for="productCode">Code</label>
		</div>
		<div class="input-field">
			<input type="text" id="productName">
			<label for="productName">Name</label>
		</div>
		<div class="input-field">
			<input type="text" id="productDescription">
			<label for="productDescrition">Description</label>
		</div>
		<div class="input-field">
			<select id="productSubtype">
				<option disabled>-- SELECT SUBTYPE --></option>
				<?php
					foreach($subtypes_array as $subtype){
						$st_n = $subtype['name'];
						$st_id = $subtype['product_subtype_id'];
						echo "<option value='$st_id'>$st_n</option>";
					}
				?>
			</select>
			<label>Subtype</label>
		</div>
		<div class="input-field">
			<input type="text" id="productPrice">
			<label for="productPrice">Product Price</label>
		</div>
		<div class="input-field">
			<input type="text" id="productAvailable">
			<label for="productAvailable">Available Stocks</label>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close btn-large blue waves-effect waves-light hoverable  w3-border w3-border-white">Back</a>
		<a href="#!" onclick="addProduct()" class="modal-action modal-close btn-large green waves-effect waves-light hoverable   w3-border w3-border-white">Add</a>
	</div>
</div>

</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
	$('select').material_select();
});

function addProduct(){
	
	var c = $("#productCode").val();
    var n = $("#productName").val();
	var d = $("#productDescription").val();
	var s = $("#productSubtype").val();
	var p = $("#productPrice").val();
	var a = $("#productAvailable").val();
	
	$.ajax({
		type:'POST',
		cache:false,
		url:'process/add_product.php',
		data: {
			product_code : c,
			name : n,
			description : d,
			product_subtype_id : s,
			price : p,
			available_stocks : a		
		},
		success: function(result){
			$("#productCode").val("");
			$("#productName").val("");
			$("#productDescription").val("");
			$("#productSubtype").val("");
			$("#productPrice").val("");
			$("#productAvailable").val("");
			Materialize.toast(result,3000);
		}
		
	}).fail(function(){
		Materialize.toast("Error Adding Product",3000);
	});

}
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

