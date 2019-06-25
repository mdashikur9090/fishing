<?php
include( "../dbCon.php" );
$con = connection();


if(isset($_GET["id"])){ 
	$id=$_GET["id"];
	echo($id);
	$sql="DELETE FROM `request_place` WHERE `ID`=$id";
	$con->query($sql);
	header("location:CheckCustomerRequest.php");
	}

if(isset($_GET["kitid"])){ 
	$id=$_GET["kitid"];
	echo($id);
	$sql="DELETE FROM `request_kit` WHERE `ID`=$id";
	$con->query($sql);
	header("location:CheckCustomerRequest.php");
	}

?>

