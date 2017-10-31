<?php
/*
Subtype
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
$activity_title = "Subtype";

// Include DB Getters
include("_prepare/types.php");
include("_prepare/subtypes.php");

?>
<!Doctype html>
<html lang="en">
	<head>
		<title><?php echo $activity_title . " - " . $site_name; ?></title>
		<?php include("_system/styles.php"); ?>
	</head>
	<body>
		<?php include("_contents/navbar.php"); ?>
		<div class="container">
			<br><br>
				<a class="btn-medium orange waves-effect waves-light hoverable   w3-border w3-border-white  btn modal-trigger" href="#addSubtype"><i class='material-icons'>add</i></a>
				<a class="btn-medium green waves-effect waves-light hoverable   w3-border w3-border-white  btn modal-trigger" href="subtype.php"><i class='material-icons'>refresh</i></a>
			<br><br>
			<table border = 1 class=" responsive-table highlight striped bordered">
				<tr class="w3-blue">
					<td>ID</td>
					<td>Name</td>
					<td>Description</td>
					<td>Type</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
				<?php
				foreach($subtypes_array as $subtype){ ?>
				<tr>
					<td>
						<?php echo $subtype['product_subtype_id']; ?>	
					</td>
					<td>
						<?php echo $subtype['name']; ?>	
					</td>
					<td>
						<?php echo $subtype['description']; ?>	
					</td>
					<td>
						<?php echo $subtype['product_type_name']; ?>	
					</td>
					<td>
						<a class="modal-trigger" href="#editSubtypeModal<?php echo $subtype['product_subtype_id']; ?>"><i class="material-icons">edit</i></a>
					</td>
					<td>
						<a class="red-text" href="process/delete_subtype.php?id=<?php echo $subtype['product_subtype_id']; ?>"><i class="material-icons">delete</i></a>
					</td>
				</tr>
				<div class="modal modal-fixed-footer" id="editSubtypeModal<?php echo $subtype['product_subtype_id']; ?>">
					<div class="modal-content">
						<h4 class='grey-text'>Edit Subtype</h4><br>
						<div class="input-field">
							<input type="text" id="nameField<?php echo $subtype['product_subtype_id']; ?>" value="<?php echo $subtype['name']; ?>">
							<label for="nameField<?php echo $subtype['product_subtype_id']; ?>">Name</label>
						</div>
						<div class="input-field">
							<input type="text" id="descriptionField<?php echo $subtype['product_subtype_id']; ?>" value="<?php echo $subtype['description']; ?>">
							<label for="descriptionField<?php echo $subtype['product_subtype_id']; ?>">Description</label>
						</div>
						<div class="input-field">
							<select id="typeField<?php echo $subtype['product_subtype_id']; ?>">
								<option disabled>-- SELECT TYPE --</option>
							<?php
								foreach($types_array as $types){
									$t_name = $types['name'];
									$t_id = $types['product_type_id'];
									$t_s = "";
									if($t_id == $subtype['product_type_id']) $t_s = "selected";
									echo "<option value='$t_id' $t_s>$t_name</option>";	
								}
							?>
							</select>
							<label>Type</label>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-action modal-close btn-large blue waves-effect waves-light hoverable  w3-border w3-border-white">Back</a>
						<a href="#!" onclick="editSubtype<?php echo $subtype['product_subtype_id']; ?>()" class="modal-action modal-close btn-large green waves-effect waves-light hoverable   w3-border w3-border-white">Edit</a>
					</div>
				</div>
				<script>
					function editSubtype<?php echo $subtype['product_subtype_id']; ?>(){
						var n<?php echo $subtype['product_subtype_id']; ?> = $("#nameField<?php echo $subtype['product_subtype_id']; ?>").val();
						var d<?php echo $subtype['product_subtype_id']; ?> = $("#descriptionField<?php echo $subtype['product_subtype_id']; ?>").val();
						var t<?php echo $subtype['product_subtype_id']; ?> = $("#typeField<?php echo $subtype['product_subtype_id']; ?>").val();

						if(!n<?php echo $subtype['product_subtype_id']; ?>){
							Materialize.toast("Name cannot be empty",3000);
						} else {
							if(!t<?php echo $subtype['product_subtype_id']; ?>){
								Materialize.toast("Type cannot be empty",3000);
							} else {
								$.ajax({
									type:'POST',
									cache:false,
									url:'process/edit_subtype.php?id=<?php echo $subtype['product_subtype_id']; ?>',
									data: {
										name: n<?php echo $subtype['product_subtype_id']; ?>,
										description: d<?php echo $subtype['product_subtype_id']; ?>,
										product_type_id: t<?php echo $subtype['product_subtype_id']; ?>
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
				</script>
				<?php } ?>
			</table>
		</div>
<!-- Modal -->
<div class="modal modal-fixed-footer" id="addSubtype">
	<div class="modal-content">
		<h4 class="grey-text">Add Subtype</h4>
		<br>
		<div class="input-field">
			<input type="text" id="name">
			<label for="name">Name</label>
		</div>
		<div class="input-field">
			<input type="text" id="description">
			<label for="description">Description</label>
		</div>
		<div class="input-field">
			<select id="product_type_id">
				<option disabled>-- SELECT TYPE --</option>
				<?php
					foreach($types_array as $type){
						$t_name = $type['name'];
						$t_id = $type['product_type_id'];
						echo "<option value='$t_id'>$t_name</option>";
					}
				?>
			</select>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close btn-large blue waves-effect waves-light hoverable  w3-border w3-border-white">Back</a>
		 <a href="#!" onclick="addSubtype()" class="modal-action modal-close btn-large green waves-effect waves-light hoverable   w3-border w3-border-white">Add</a>
	</div>
</div>
	</body>
</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
	$('select').material_select();
});

function addSubtype(){
	var n = $("#name").val();
	var d = $("#description").val();
	var t = $("#product_type_id").val();

	if(!n){
		Materialize.toast("Name Cannot be Empty!",3000);
	} else {
		if(!t){
			Materialize.toast("Type Cannot be Empty!",3000);
		} else {
			$.ajax({
				type:'POST',
				cache:false,
				url:'process/add_subtype.php',
				data: {
					name: n,
					description: d,
					product_type_id: t
				},
				success: function(result){
					Materialize.toast(result,3000);
					$("#name").val("");
					$("#description").val("");
					$("#product_type_id").val("");
				}
			}).fail(function(){
				Materialize.toast("An Error Occurred",3000);
			});
		}
	}
}
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

