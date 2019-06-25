<?php 

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

	include("../dbCon.php");
		$con=connection();

	if(isset($_GET["product_id"])){
		$ID=$_GET["product_id"]; 
	 
		$sql="DELETE FROM `product` WHERE `ID`='$ID' ";
		if($con->query($sql)){
			$_SESSION["productDeleteStatus"]="delete successfully done";
			header("location:Edit_product.php");
			
		}
		else{
			$_SESSION["productDeleteStatus"]="not deleted";
			header("location:Edit_product.php");
		}
	}

?> 
 