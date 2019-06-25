
<?php 
	include("../dbCon.php");
	$con=connection();
	if(session_status()==PHP_SESSION_NONE){
		session_start();
	}

	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
?>
	<script>
		location.href="<?=$_SESSION["directory"]?>login.php";
	</script>

<?php } else{ ?>

<?php

				//check request from product detail page
				if (isset($_GET["productDet"])) {
					//insert product from shop page to cart database
					if(isset($_GET["id"])){
						$id=$_GET["id"];
						echo($id);
						$userID=$_SESSION["userid"];

						$checkProductSql = "SELECT `ID` FROM `cart` WHERE `productID`=$id AND `userID`=$userID AND `hireId`=0";
						$result = $con->query( $checkProductSql );
						if ( $result->num_rows > 0 ) {
							$_SESSION["cartMsg"]="This Product already added into your buy cart.";
						}else{

							$sql="INSERT INTO `cart`( `productID`, `userID`, qty) VALUES ($id, $userID. 1)";
							if($con->query($sql)){
								$_SESSION["cartMsg"]="Product has been added to buy cart.";
							}else{
								$_SESSION["cartMsg"]="Fail to add into buy cart.";
							}
								
						}

						//echo($_SESSION["cartMsg"]);
						header("location:product-details.php?productID=$id");
						
					}


					//insert product from shop page to cart database
					if(isset($_GET["hireid"])){
						$id=$_GET["hireid"];
						$userID=$_SESSION["userid"];

						$checkProductSql = "SELECT `ID` FROM `cart` WHERE `productID`=$id AND `userID`=$userID AND `hireId`=1";
						$result = $con->query( $checkProductSql );
						if ( $result->num_rows > 0 ) {
							$_SESSION["cartMsg"]="This Product already added into your hire cart.";
						}else{

							$sql="INSERT INTO `cart`( `productID`,`hireId`, `userID`, qty, days) VALUES ($id,1,$userID, 1, 1)";
							if($con->query($sql)){
								$_SESSION["cartMsg"]="Product has been added to hire cart.";
							}else{
								$_SESSION["cartMsg"]="Fail to add into hire cart.";
							}

						}

						//echo($_SESSION["cartMsg"]);
						header("location:product-details.php?productID=$id");

						
					}
				}else{

					//insert product from shop page to cart database
					if(isset($_GET["id"])){
						$id=$_GET["id"];
						echo($id);
						$userID=$_SESSION["userid"];

						$checkProductSql = "SELECT `ID` FROM `cart` WHERE `productID`=$id AND `userID`=$userID AND `hireId`=0";
						$result = $con->query( $checkProductSql );
						if ( $result->num_rows > 0 ) {
							$_SESSION["cartMsg"]="This Product already added into your buy cart.";
						}else{

							$sql="INSERT INTO `cart`( `productID`, `userID`, qty) VALUES ($id,$userID, 1)";
							if($con->query($sql)){
								$_SESSION["cartMsg"]="Product has been added to buy cart.";
							}else{
								$_SESSION["cartMsg"]="Fail to add into buy cart.";
							}
								
						}

						//echo($_SESSION["cartMsg"]);
						header("location:product.php");
						
					}


					//insert product from shop page to cart database
					if(isset($_GET["hireid"])){
						$id=$_GET["hireid"];
						$userID=$_SESSION["userid"];

						$checkProductSql = "SELECT `ID` FROM `cart` WHERE `productID`=$id AND `userID`=$userID AND `hireId`=1";
						$result = $con->query( $checkProductSql );
						if ( $result->num_rows > 0 ) {
							$_SESSION["cartMsg"]="This Product already added into your hire cart.";
						}else{

							$sql="INSERT INTO `cart`( `productID`,`hireId`, `userID`, qty, days) VALUES ($id,1,$userID, 1, 1)";
							if($con->query($sql)){
								$_SESSION["cartMsg"]="Product has been added to hire cart.";
							}else{
								$_SESSION["cartMsg"]="Fail to add into hire cart.";
							}

						}

						//echo($_SESSION["cartMsg"]);
						header("location:product.php");

						
					}

				}
		}




?>