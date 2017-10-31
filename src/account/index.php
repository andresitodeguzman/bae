<?php
/*
Index
*/

// Start Session
session_start();

// Include Config File
include("../_system/config.php");

// Activity Title
$activity_title = "Account";

?>
<!Doctype html>
<html lang="en">
	<head>
		<title><?php echo $activity_title . " - " . $site_name; ?></title>
		<?php include("../_system/styles.php"); ?>
	</head>
	<body class="grey lighten-3">
		<div class="container">
			<div class="container">
				<br><br><br>

				<div class="card z-depth-3 hoverable">
					<div class="card-content">
						<center>
							<img src="../pics/b.jpg" width="130px">
						</center>
						<br>
						<div class="input-field">
							<input type="text" id="username">
							<label for="username">Username</label>
						</div>
						<div class="input-field">
							<input type="password" id="password">
							<label for="password">Password</label>
						</div>
						<br><br>
						<a onclick="login()" class="btn btn-medium waves-effect waves-light yellow darken-1 black-text right">
							Sign-In
						</a>
						<br><br>
					</div>
				</div>
				<br><br>
				<p>
					<center class="grey-text" style="font-size:9pt;">
						<b>B.A.E (Glass and Aluminum Supply) &reg;</b><br>
						Copyright <?php echo @date("Y"); ?><br>
						All rights reserved
					</center>
				</p>
				<br><br><br>
			</div>
		</div>
	</body>
</html>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('.modal').modal();
}).keypress(function(e){
	var key = e.which;
	if(key==13){
		login();
	}
});

function login(){
	var u = $("#username").val();
	var p = $("#password").val();

	if(!u){
		Materialize.toast("Username cannot be empty!",3000);
	} else {
		if(!p){
			Materialize.toast("Password cannot be empty!",3000);
		} else {
			$.ajax({
				type:'POST',
				cache:false,
				url:'../process/account_signin.php',
				data:{
					username: u,
					password: p
				}, 
				success: function(result){
					if(result=="Ok"){
						window.location.replace('/');
					} else {
						Materialize.toast(result,3000);
					}
				}
			}).fail(function(){
				Materialize.toast("An Error Occured!",3000);
			});
		}
	}
}
</script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

