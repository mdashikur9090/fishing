<?php 

include( "../dbCon.php" );
$con = connection();

if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}


$userId = $_SESSION["userid"];
$id = $_REQUEST['productID'];

if (isset( $_REQUEST['buy']) ) {

	$sql = "SELECT * FROM  cart  WHERE  productID= $id AND  userID = $userId AND  hireId = 0";

	$result = $con->query( $sql );

	if ( $result->num_rows > 0 ) {

	    foreach ( $result as $row ) {
	        $db_qty=$row["qty"];
	    }
	}

	if (isset( $_REQUEST['plus']) ) {
		$c_qty = $db_qty+1;

		$sql2 = "UPDATE cart SET qty=$c_qty  WHERE  productID= $id AND  userID = $userId AND  hireId = 0";
		$con->query( $sql2 );
	}else{

		$c_qty = $db_qty-1;

		$sql2 = "UPDATE cart SET qty=$c_qty  WHERE  productID= $id AND  userID = $userId AND  hireId = 0";
		$con->query( $sql2 );

	}


}elseif (isset( $_REQUEST['hire']) ) {
	
	$sql = "SELECT * FROM  cart  WHERE  productID= $id AND  userID = $userId AND  hireId = 1";

	$result = $con->query( $sql );

	if ( $result->num_rows > 0 ) {

	    foreach ( $result as $row ) {
	        $db_qty=$row["qty"];
	    }
	}
	
	if (isset( $_REQUEST['plus']) ) {
		$c_qty = $db_qty+1;

		$sql2 = "UPDATE cart SET qty=$c_qty  WHERE  productID= $id AND  userID = $userId AND  hireId = 1";
		$con->query( $sql2 );
	}else{

		$c_qty = $db_qty-1;

		$sql2 = "UPDATE cart SET qty=$c_qty  WHERE  productID= $id AND  userID = $userId AND  hireId = 1";
		$con->query( $sql2 );

	}



}else{
}



$response = array();
$response['sql']  = $sql;


echo json_encode($response);




?>