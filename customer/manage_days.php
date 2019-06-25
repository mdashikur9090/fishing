<?php 

include( "../dbCon.php" );
$con = connection();

if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}


$userId = $_SESSION["userid"];
$id = $_REQUEST['productID'];

$sql = "SELECT * FROM  cart  WHERE  productID= $id AND  userID = $userId AND  hireId = 1";

$result = $con->query( $sql );

if ( $result->num_rows > 0 ) {

    foreach ( $result as $row ) {
    	if (is_null($db_days=$row["days"])) {
    		$db_days=0;
    	}else{
        	$db_days=$row["days"];
        }
    }
}

if (isset( $_REQUEST['plus']) ) {
	$c_days = $db_days+1;

	$sql2 = "UPDATE cart SET days=$c_days  WHERE  productID= $id AND  userID = $userId AND  hireId = 1";
	$con->query( $sql2 );
}else{

	$c_days = $db_days-1;

	$sql2 = "UPDATE cart SET days=$c_days  WHERE  productID= $id AND  userID = $userId AND  hireId = 1";
	$con->query( $sql2 );

}



$response = array();
$response['sql']  = $sql;


echo json_encode($response);




?>