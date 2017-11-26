<?php
/*
Index
*/

// Start Session
session_start();

// Include Config File
include("_system/config.php");

// Activity Title
$activity_title = "Edit Account";

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
			<h4 class="grey-text"><b>Edit Account Information</b></h4><br>
			<div class="input-field">
				<input type="text" id="name" value="<?php echo $_SESSION['name']; ?>">
				<label for="name">Name</label>
			</div>
			<div class="input-field">
				<input type="text" id="username" value="<?php echo $_SESSION['username']; ?>">
				<label for="username">Username (No Spaces Allowed)</label>
			</div><br><br>
			<div class="input-field">
				<input type="Password" id="old_password">
				<label for="old_password">Current Password</label>
			</div>
			<div class="input-field">
				<input type="Password" id="new_password">
				<label for="new_password">New Password</label>
			</div><br><br><br>
			<button id="submit" class="btn btn-large yellow black-text waves-effect waves-light">Edit Information</button>
		</div><br><br><br><br><br>
	</body>
</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
});

$("#submit").click(function(){
	editAccount();
});

function editAccount(){
	var n = $("#name").val();
	var u = $("#username").val();
	var op = $("#old_password").val();
	var np = $("#new_password").val();

	if(!n){
		Materialize.toast("Name cannot be empty!");
	} else {
		if(!u){
			Materialize.toast("Username cannot be empty!");
		} else {

			$.ajax({
				type:'POST',
				cache:false,
				url:'/process/account_edit.php',
				data:{
					name: n,
					username: u,
					old_password: op,
					new_password: np
				},
				success: function(result){
					if(result=="Ok"){
						window.location.replace('/account/signout.php');
					} else {
						Materialize.toast(result,3000);
					}
				}
			}).fail(function(){
				Materialize.toast("An Error Occured");
			});

		}
	}
}
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

