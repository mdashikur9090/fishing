<?php
include( "../dbCon.php" );
$con = connection();

if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
?>

<script>
	location.href="<?=$_SESSION["directory"]?>login.php";
</script>

<?php
	}else if( isset($_SESSION["isLogedIn"]) && $_SESSION["role"]==0 ){
?>

<script>
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>

<?php

	}



if(isset($_GET["id"])){ 
	$id=$_GET["id"];
	//echo($id);
	$sql="DELETE FROM `fishing_result` WHERE `ID`=$id";
	$con->query($sql);

	//echo $sql;

	$_SESSION["msg"]="Result has been delelte successfully.";


	header("location:fishingResult.php");
	}

?>

