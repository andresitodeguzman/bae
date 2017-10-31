<?php
/*
Types
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
$activity_title = "Types";

// Include DB Getter
include("_prepare/types.php");
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
				<a class="btn-medium orange waves-effect waves-light hoverable   w3-border w3-border-white  btn modal-trigger" href="#addType"><i class='material-icons'>add</i></a>
				<a class="btn-medium green waves-effect waves-light hoverable   w3-border w3-border-white  btn modal-trigger" href="types.php"><i class='material-icons'>refresh</i></a>
			<br><br>
			<table border = 1 class=" responsive-table highlight striped bordered">
				<tr class="w3-blue">
					<td>ID</td>
					<td>Name</td>
					<td>Description</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			<?php
			foreach($types_array as $type){
			?>
				<tr>
					<td>
						<?php echo $type['product_type_id']; ?>
					</td>
					<td>
						<?php echo $type['name']; ?>
					</td>
					<td>
						<?php echo $type['description']; ?>
					</td>
					<td>
						<a class="modal-trigger" href="#editTypeModal<?php echo $type['product_type_id']; ?>"><i class="material-icons">edit</i></a>
					</td>
					<td>
						<a class="red-text" href="process/delete_type.php?id=<?php echo $type['product_type_id']; ?>"><i class="material-icons">delete</i></a>
					</td>
				</tr>
				<div class="modal modal-fixed-footer" id="editTypeModal<?php echo $type['product_type_id']; ?>">
					<div class="modal-content">
						<h4 class='grey-text'>Edit Type</h4><br>
						<div class="input-field">
							<input type="text" id="nameField<?php echo $type['product_type_id']; ?>" value="<?php echo $type['name']; ?>">
							<label for="nameField<?php echo $type['product_type_id']; ?>">Name</label>
						</div>
						<div class="input-field">
							<input type="text" id="descriptionField<?php echo $type['product_type_id']; ?>" value="<?php echo $type['description']; ?>">
							<label for="descriptionField<?php echo $type['product_type_id']; ?>">Description</label>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-action modal-close btn-large blue waves-effect waves-light hoverable  w3-border w3-border-white">Back</a>
						<a href="#!" onclick="editType<?php echo $type['product_type_id']; ?>()" class="modal-action modal-close btn-large green waves-effect waves-light hoverable   w3-border w3-border-white">Edit</a>
					</div>
				</div>
				<script type="text/javascript">
					function editType<?php echo $type['product_type_id']; ?>(){
						var n<?php echo $type['product_type_id']; ?> = $("#nameField<?php echo $type['product_type_id']; ?>").val();
						var d<?php echo $type['product_type_id']; ?> = $("#descriptionField<?php echo $type['product_type_id']; ?>").val();

						if(!n<?php echo $type['product_type_id']; ?>){
							Materialize.toast("Name Cannot be Empty");
						} else {
							$.ajax({
								type:'POST',
								url:'process/edit_type.php?id=<?php echo $type['product_type_id']; ?>',
								cache:false,
								data: {
									name: n<?php echo $type['product_type_id']; ?>,
									description: d<?php echo $type['product_type_id']; ?>
								},
								success: function(result){
									$('#n<?php echo $type['product_type_id']; ?>').val("");
									$('#d<?php echo $type['product_type_id']; ?>').val("");
									Materialize.toast(result,3000);
								}
							}).fail(function(){
								Materialize.toast("An Error Occurred",3000);
							});
						}

					}
				</script>
			<?php
			}
			?>
			</table>
		</div>
	</body>

<!--Modal-->

<div class="modal modal-fixed-footer" id="addType">
	<div class="modal-content">
		<h4 class="grey-text">Add Type</h4>
		<br>
		<div class="input-field">
			<input type="text" id="name">
			<label for="name">Name</label>
		</div>
		<div class="input-field">
			<input type="text" id="description">
			<label for="description">Description</label>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close btn-large blue waves-effect waves-light hoverable  w3-border w3-border-white">Back</a>
		 <a href="#!" onclick="addType()" class="modal-action modal-close btn-large green waves-effect waves-light hoverable   w3-border w3-border-white">Add</a>
	</div>
</div>

</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
});

function addType(){
	var n = $("#name").val();
	var d = $("#description").val();

	if(!n){
		Materialize.toast("Name cannot be empty",3000);
	} else {
		$.ajax({
			type:'POST',
			cache: false,
			url: 'process/add_type.php',
			data: {
				name: n,
				description: d
			},
			success: function(result){
				$("#name").val("");
				$("#description").val("");
				Materialize.toast(result,3000);
			}
		}).fail(function(){
			Materialize.toast("An Error Occured",3000);
		});
	}
}
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

