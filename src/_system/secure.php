<?php
if(empty($_SESSION['signed_in'])) {
	header("Location: /account/");
} else {
	if(@$_SESSION['signed_in'] == False){
		header("Location: /account/");
	}
}
?>