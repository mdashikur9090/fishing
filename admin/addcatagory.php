
 
<?php
   //catagory add

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
include("../dbCon.php");
		$con=connection();
if(isset($_POST["AddCat"])){
	 $C_Name=$_REQUEST["catagory"];
	$sql1="INSERT INTO `catagory`( `name`) VALUES ('$C_Name')";
	echo($sql1);
	//exit();
	if($con->query($sql1)){
		$msgg="Successfully added";
		header("location:Edit_product.php");
	}else{
		
		$msgg="database error.";
		header("location:Edit_product.php");
	}
}


if(isset($_GET["Cat_id"])){
	$id=$_GET["Cat_id"];
	 
	 
	$sql="DELETE FROM `catagory` WHERE `ID`=$id";
	if($con->query($sql)){
		$msgg="Successfully remove";
		header("location:Edit_product.php");
	}else{
		
		$msgg="database error.";
		header("location:Edit_product.php");
	}
}



?>