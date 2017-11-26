<nav class="<?php echo $site_color; ?>">
	<!-- Nav Links -->
	<div class="left">
		<a href="#" data-activates="slide-out" class="button-collapse show-on-large">
			<i class="material-icons">menu</i>
		</a>
		<a href="index.php" class="title">
			<b><?php echo $site_name;?></b> <?php echo $activity_title; ?>
		</a> 
	</div>
	<div class="right">
		<?php
		if(@$_SESSION['signed_in']){
			echo '
				<a href="#notification" class="modal-trigger" onclick="notification();">
					<i class="material-icons">notifications</i>
				</a>
			';
		}
		?>
	</div>
</nav>
<!-- Side Nav -->
<ul id="slide-out" class="side-nav">
	<li>
		<div class="user-view">
			<div class="background red darken-1">
			</div>
			<p class="white-text">
				<b><?php echo $site_name; ?></b>
			</p>
		</div>
	</li>
	<li>
		<a href="index.php">
			<i class='material-icons'>home</i> Home
		</a>
	</li>
	<?php
	if(@$_SESSION['signed_in'] == True){
	echo "
	<li>
		<a href='calendar.php'>
			<i class='material-icons'>info</i> Calendar
		</a>
	</li>
	<li>
		<a href='edit_account.php'>
			<i class='material-icons'>edit</i> Edit Account
		</a>
	</li>
	<li>
		<div class='divider'></div>
	</li>
	<li>
		<a href='product.php'>
			<i class='material-icons'>list</i> Products
		</a>
	</li>
	<li>
		<a href='by_subtype.php'>
			<i class='material-icons'>sort</i> Products by Subtype
		</a>
	</li>
	<li>
		<a href='supplier.php'>
			<i class='material-icons'>assignment_ind</i> Supplier
		</a>
	</li>
	<li>
		<div class='divider'></div>
	</li>
	<li>
		<a href='report/product.php' target='_blank'>
			<i class='material-icons'>assessment</i> Product Report
		</a>
	</li>
	<li>
		<div class='divider'></div>
	</li>
	<li>
		<a href='types.php'>
			<i class='material-icons'>view_list</i> Types
		</a>
	</li>
	<li>
		<a href='subtype.php'>
			<i class='material-icons'>view_quilt</i> Subtypes
		</a>
	</li>
		"; 
		}
	?>
	<li>
		<div class='divider'></div>
	</li>
	<li>
		<?php
			$signin_name = "Sign-In";
			$signin_link = "/account/";
			if(@$_SESSION['signed_in'] == True){
				$signin_name = "Sign-Out, ".$_SESSION['name'];
				$signin_link = "/account/signout.php";
			}
		?>
		<a href="<?php echo $signin_link; ?>">
			<i class='material-icons'>person</i> <?php echo $signin_name; ?>
		</a>
	</li>
</ul>
<!-- .Side Nav -->

<div class="modal modal-fixed-footer" id="notification">
	<div class="modal-content">
		<h3 class="grey-text">Notifications</h3><br>
		<div class="notification-content"></div>
	</div>
	<div class="modal-footer">
		<a class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
	</div>
</div>
<script type="text/javascript">
function notification(){
	$.ajax({
		type:'GET',
		cache: false,
		url: '_preprocess/notification.php',
		data: {
			do: 'a'
		},
		success: function(result){
			$(".notification-content").html(result);
		}
	}).fail(function(){
		let error = "<center><h4 class='grey-text'>Error Loading Notifications</h4></center>";
		$(".notification-content").html(error);
	});
}
</script>