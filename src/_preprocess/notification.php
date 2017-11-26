<?php

session_start();

$usr_id = $_SESSION['user_id'];

include("../_system/connection.php");

if(empty($_SESSION['signed_in'])) {
	die("You are not signed in");
} else {
	if(@$_SESSION['signed_in'] == False){
		die("You are not signed in");
	}
}

$resulting_table = $mysqli->query("SELECT * FROM notification ORDER BY `notification_id` DESC");

$notif_array = array();

while($notif = mysqli_fetch_array($resulting_table)){

	$do = False;

	$user_id = $notif['user_id'];

	if(($user_id == $usr_id) XOR ($user_id == "")) {

		$notification_id = $notif['notification_id'];
		$title = $notif['title'];
		$description = $notif['description'];
		$url = $notif['url'];
		$user_id = $notif['user_id'];
		$date = $notif['date'];
		$time = $notif['time'];

		if(empty($url)) $url = "index.php";
		
		$array = array(
			"notification_id" => "$notification_id",
			"title" => "$title",
			"description" => "$description",
			"url" => "$url",
			"user_id" => "$user_id",
			"date" => "$date",
			"time" => "$time"
		);
	
		array_push($notif_array, $array);

	}
}

if(count($notif_array) == 0){
	echo "
	<center>
		<h5>No notifications</h5>
	</center>
	";
} else {

	echo "<ul class='collection'>";
	foreach($notif_array as $notif){

		$notification_id = $notif['notification_id'];
		$title = $notif['title'];
		$description = $notif['description'];
		$url = $notif['url'];
		$user_id = $notif['user_id'];
		$date = $notif['date'];
		$time = $notif['time'];

		echo "
			<li class='collection-item'>
				<a href='$url'>
					<p>
						<b>$title</b><br>
						$description
					</p>
					<font size='-1'>$date $time - <a href='#$notification_id' onclick='deleteNotif$notification_id();' class='red-text'>Delete</a> </font>
				</a>
			</li>
			<script type='text/javascript'>
				function deleteNotif$notification_id(){
					$.ajax({
						type:'GET',
						url: '/process/delete_notification.php?notification_id=$notification_id',
						data: {
							do: '1'
						},
						cache: false,
						success: function(result){
							if(result){
								Materialize.toast(result,3000);
							}
							notification();
						}
					}).fail(function(){
						Materialize.toast('Cannot Delete Notification',3000);
						notification();
					});
				}
			</script>
		";
	}
	echo "</ul>";

}
?>
