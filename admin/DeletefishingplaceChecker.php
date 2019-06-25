 


<?php
 include( "../dbCon.php" );
 $con = connection();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

if(isset($_GET["msg"])){
	$delt_ID=$_GET["msg"];
	$sql="UPDATE `fishingplace` SET `role`=1 WHERE `ID`=$delt_ID";
	echo($sql);
	//exit();
	if($con->query($sql)){
		 
		$sql1="DELETE FROM `customer_ticket` WHERE `fishingPlaceID`=$delt_ID AND `role`=0";
		if($con->query($sql1)){
		$_SESSION["msg"]="successfully deleted.";
		}else{
		$_SESSION["msg"]="databasse error";
		}
	}else{
		$_SESSION["msg"]="databasse error in fishing place";
	}
	header("location:Edit_fishingplace.php");
}


?>