<?php
/*
Supplier
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
$activity_title = "Supplier";

// Include DB Getter
include("_prepare/supplier.php");

?>
<!Doctype html>
<html lang="en">
	<head>
		<title><?php echo $activity_title." - ".$site_name; ?></title>
		<?php include("_system/styles.php"); ?>
	</head>
	<body>
		<?php include("_contents/navbar.php"); ?>
		<div class="container">
			<br><br>
				<a class="btn-medium orange waves-effect waves-light hoverable   w3-border w3-border-white  btn modal-trigger" href="#addSupplier"><i class='material-icons'>add</i></a>
				<a class="btn-medium green waves-effect waves-light hoverable   w3-border w3-border-white  btn modal-trigger" href="supplier.php"><i class='material-icons'>refresh</i></a>
			<br><br>
			<table border = 1 class=" responsive-table highlight striped bordered">
				<tr class="w3-blue">
					<td>ID</td>
					<td>Name</td>
					<td>Description</td>
					<td>Address</td>
					<td>Contact Number</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
				<?php
					foreach($supplier_array as $supplier){
						$supplier_id = $supplier['supplier_id'];
						$supplier_name = $supplier['supplier_name'];
						$supplier_description = $supplier['supplier_description'];
						$supplier_address = $supplier['supplier_address'];
						$supplier_contact = $supplier['supplier_contact'];
						
						echo "
						<tr>
							<td>$supplier_id</td>
							<td>$supplier_name</td>
							<td>$supplier_description</td>
							<td>$supplier_address</td>
							<td>$supplier_contact</td>
							<td>
								<a class='modal-trigger' href='#supplierEditModal$supplier_id'><i class='material-icons'>edit</i></a>
							</td>
							<td>
								<a class='red-text' href='process/delete_supplier.php?id=$supplier_id'><i class='material-icons'>delete</i></a>
							</td>
						</tr>
						<div class='modal modal-fixed-footer' id='supplierEditModal$supplier_id'>
							<div class='modal-content'>
								<h4 class='grey-text'>Edit Product</h4><br>
								<div class='input-field'>
									<input type='text' id='name$supplier_id' value='$supplier_name'>
									<label for='name$supplier_id'>Name</label>
								</div>
								<div class='input-field'>
									<input type='text' id='description$supplier_id' value='$supplier_description'>
									<label for='description$supplier_id'>Description</label>
								</div>
								<div class='input-field'>
									<input type='text' id='address$supplier_id' value='$supplier_address'>
									<label for='address$supplier_id'>Address</label>
								</div>
								<div class='input-field'>
									<input type='text' id='contact$supplier_id' value='$supplier_name'>
									<label for='contact$supplier_id'>Contact Number</label>
								</div>
							</div>
							<div class='modal-footer'>
								<a href='#!' class='modal-action modal-close btn-large blue waves-effect waves-light hoverable  w3-border w3-border-white'>Back</a>
								<a href='#!' onclick='editSupplier$supplier_id()' class='modal-action modal-close btn-large green waves-effect waves-light hoverable   w3-border w3-border-white'>Edit</a>
							</div>
						</div>
						<script>
							function editSupplier$supplier_id(){
								var n$supplier_id = $('#name$supplier_id').val();
								var d$supplier_id = $('#description$supplier_id').val();
								var a$supplier_id = $('#address$supplier_id').val();
								var c$supplier_id = $('#contact$supplier_id').val();
								
								if(!n$supplier_id){
									Materialize.toast('Name cannot be empty',3000);
								} else {
									$.ajax({
										type:'POST',
										cache: false,
										url: 'process/edit_supplier.php?id=$supplier_id',
										data: {
											supplier_name: n$supplier_id,
											supplier_description: d$supplier_id,
											supplier_address: a$supplier_id,
											supplier_contact: c$supplier_id
										},
										success: function(result){
											Materialize.toast(result,3000);
										}
									}).fail(function(){
										Materialize.toast('An Error Occured',3000);
									});
								}
								
							}
						</script>
						";
						
					}
				?>
			</table>
		</div>
<!--modal-->
<div class='modal modal-fixed-footer' id='addSupplier'>
	<div class='modal-content'>
		<h4 class="grey-text">Add Product</h4><br>
		<div class='input-field'>
			<input type='text' id='name'>
			<label for='name'>Name</label>
		</div>
		<div class='input-field'>
			<input type='text' id='description'>
			<label for='description'>Description</label>
		</div>
		<div class='input-field'>
			<input type='text' id='address'>
			<label for='address'>Address</label>
		</div>
		<div class='input-field'>
			<input type='text' id='contact'>
			<label for='contact'>Contact Number</label>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close btn-large blue waves-effect waves-light hoverable  w3-border w3-border-white">Back</a>
		<a href="#!" onclick="addSupplier()" class="modal-action modal-close btn-large green waves-effect waves-light hoverable   w3-border w3-border-white">Add</a>
	</div>
</div>
	</body>
</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
});

function addSupplier(){
	var n = $("#name").val();
	var d = $("#description").val();
	var a = $("#address").val();
	var c = $("#contact").val();
	
	if(!n){
		Materialize.toast("Name Cannot be Empty",3000);
	} else {
		$.ajax({
			type:'POST',
			cache: false,
			url: 'process/add_supplier.php',
			data: {
				supplier_name: n,
				supplier_description: d,
				supplier_address: a,
				supplier_contact: c
			},
			success: function(result){
				Materialize.toast(result,3000);
				$("#name").val("");
				$("#description").val("");
				$("#address").val("");
				$("#contact").val("");
			}
		}).fail(function(){
			Materialize.toast("An Error Occured",3000);
		});
	}
	
}
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

