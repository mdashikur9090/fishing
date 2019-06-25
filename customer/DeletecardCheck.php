<?php 
include("../dbCon.php");
$con=connection();
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
?>


<?php
 if(isset($_GET["id"])){
	 $id=$_GET["id"];
	$sql="DELETE FROM `cart` WHERE `ID`=$id";
	 if($con->query($sql)){
		 $_SESSION["confirmMsg"]="Item has been delete from cart successfully";
	 }else{
		  $_SESSION["confirmMsg"]="ERROR";
	 }
 
 }

 if (isset($_GET["cartType"])) {
 	header("location:hirecardCheck.php");
 }else{
 	header("location:cart.php");
 }
	
	

?>