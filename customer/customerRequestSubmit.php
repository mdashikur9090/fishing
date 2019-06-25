 
 <?php
	 include("../email.php");
	 include( "../dbCon.php" );
	 $con=connection();
	 if (session_status() == PHP_SESSION_NONE) {
	    session_start();
		}
 ?>
 

<?php
	$to=$_SESSION["useremail"];
	$subject="request confirmation";
if(isset($_POST["placesubmit"])){
	$okFlag=TRUE;
	if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$_SESSION["confirmMsg"]="please type your name.";
			$okFlag=FALSE;
	}
	if(!isset($_REQUEST["location"]) || $_REQUEST["location"]==''){
			$_SESSION["confirmMsg"]="please type your location.";
			$okFlag=FALSE;
		}
	if(!isset($_REQUEST["comment"]) || $_REQUEST["comment"]==''){
			$_SESSION["confirmMsg"]="please type your comment.";
			$okFlag=FALSE;
		}
	if($okFlag==TRUE){ 
		$name=$_REQUEST["name"];
		$location=$_REQUEST["location"];
		$comment=$_REQUEST["comment"];
		$userid=$_SESSION["userid"];
	 	
		$sql="INSERT INTO `request_place`( `name`, `location`, `comment`, `userID`) VALUES ('$name','$location', '$comment',$userid)";
		echo $sql;
		
			if($con->query($sql)){
				$_SESSION["confirmMsg"]="your request is sucessfull. please check your mail.";
					$detail=" your request for ".$name." is confirm";
				}else{
				$_SESSION["confirmMsg"]="your request is error";
			}
					//exit();
		//sendmail($to,$subject,$detail);
		//echo($_SESSION["email"]);
	
	}

 	echo($_SESSION["confirmMsg"]."<br>");
 	//header("location:customerRequest.php");

}


if(isset($_POST["kit_submit"])){
	$okFlag=TRUE;
	if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
		$_SESSION["confirmMsg"]="please type your name.";
		$okFlag=FALSE;
	}
	if(!isset($_REQUEST["brand"]) || $_REQUEST["brand"]==''){
			$_SESSION["confirmMsg"]="please type your brand.";
			$okFlag=FALSE;
		}
	if(!isset($_REQUEST["comment"]) || $_REQUEST["comment"]==''){
			$_SESSION["confirmMsg"]="please type your comment.";
			$okFlag=FALSE;
		}
	if($okFlag==TRUE){ 
	$name=$_REQUEST["name"];
	$brand=$_REQUEST["brand"];
	$comment=$_REQUEST["comment"];

	$userid=$_SESSION["userid"];
 
		$sql="INSERT INTO `request_kit`( `name`, `brand`, `comment`, `userId`) VALUES ('$name','$brand', '$comment',$userid)";
		echo $sql;
		
		if($con->query($sql)){
			$_SESSION["confirmMsg"]="your request is sucessfull. please check your email.";
				$detail=" your request for ".$name." is confirm";
			}else{
			$_SESSION["confirmMsg"]="your request is error";
		}
		//sendmail($to,$subject,$detail);
	
	}
	
 	echo($_SESSION["confirmMsg"]);
	//header("location:customerRequest.php");
}


?>