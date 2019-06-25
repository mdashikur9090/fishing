<?php 
include("../dbCon.php");
$con=connection();
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
?>


<?php
 if( isset($_GET["productId"]) && isset($_GET["star"]) ){
	$star=$_GET["star"];
	$productId=$_GET["productId"];
	$userID=$_SESSION["userid"];

	$sql = "SELECT * FROM product_rating WHERE productID = $productId AND userID = $userID";

	$result=$con->query($sql);

	if ( $result->num_rows > 0 ) {

		 $starRattingSQL ="UPDATE `product_rating` SET `star`=$star WHERE productID = $productId AND userID = $userID";

		 if($con->query($starRattingSQL)){
			 $_SESSION["cartMsg"]="Thanks for ratting! You have rated $star stars on this product.";
		 }else{
			  $_SESSION["cartMsg"]="ERROR";
		 }

	}else{

		$starRattingSQL ="INSERT INTO `product_rating`(`productID`, `userID`, `star`) VALUES($productId, $userID, $star)";
		
		 if($con->query($starRattingSQL)){
			 $_SESSION["cartMsg"]="Thanks for ratting! You have rated $star stars on this product.";
		 }else{
			  $_SESSION["cartMsg"]="ERROR";
		 }

	}

 
 }


 header("location:product-details.php?productID=".$_GET["productId"]);
	

?>