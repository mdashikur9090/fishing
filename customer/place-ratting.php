<?php 
include("../dbCon.php");
$con=connection();
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
?>


<?php
 if( isset($_GET["fishingPlaceID"]) && isset($_GET["star"]) ){
	$star=$_GET["star"];
	$fishingPlaceID=$_GET["fishingPlaceID"];
	$userID=$_SESSION["userid"];

	$sql = "SELECT * FROM place_rating WHERE fishingPlaceID = $fishingPlaceID AND userID = $userID";

	$result=$con->query($sql);

	if ( $result->num_rows > 0 ) {

		 $starRattingSQL ="UPDATE `place_rating` SET `star`=$star WHERE fishingPlaceID = $fishingPlaceID AND userID = $userID";

		 if($con->query($starRattingSQL)){
			 $_SESSION["cartMsg"]="Thanks for ratting! You have rated $star stars on this Place.";
		 }else{
			  $_SESSION["cartMsg"]="ERROR";
		 }

	}else{

		$starRattingSQL ="INSERT INTO `place_rating`(`fishingPlaceID`, `userID`, `star`) VALUES($fishingPlaceID, $userID, $star)";
		
		 if($con->query($starRattingSQL)){
			 $_SESSION["cartMsg"]="Thanks for ratting! You have rated $star stars on this Place.";
		 }else{
			  $_SESSION["cartMsg"]="ERROR";
		 }

	}

 
 }


 header("location:place-details.php?placeID=".$_GET["fishingPlaceID"]);
	

?>