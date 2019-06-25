 <?php
require_once "../vendor/autoload.php";
include("../dbCon.php");
include("../email.php");
    $con=connection();
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
 
if(!empty($_POST['token'])) {

    $token = $_POST['token'];
    $email = $_SESSION["useremail"];
    $amount = $_POST['amount'];
 
    //set api key
    $stripe = array(
        "secret_key"      => 'sk_test_LzuW0Vqrgt7NoMHk6bKb0QzC00lklxaV8j',
        "publishable_key" => 'pk_test_b708ITpUsAltH9Nm4D95lZRf00jSBkSduP'
    );
 
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
 
    //Add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
 
    //item meta
    $item_name = 'My Website Registration Fee';
    $item_price = $amount * 100;
    $currency = "usd";
    $order_id = uniqid();
 
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $item_price,
        'currency' => $currency,
        'description' => $item_name,
        'metadata' => array(
            'order_id' => $order_id
        )
    ));
 
    //retrieve charge details
    $chargeResponse = $charge->jsonSerialize();
 
    //if charge is successful
    if($chargeResponse['paid'] == 1 && $chargeResponse['captured'] == 1) {
 
        //save txn_id in the database here
        $txn_id = $chargeResponse['balance_transaction'];

        echo "successful pay";

        	
			$placeID=$_REQUEST["id"];
            $requereSeat=$_REQUEST["requiredSeat"];
            $ticket_type=$_REQUEST["ticket_type"];
            $userid=$_SESSION["userid"];
            $to=$_SESSION["useremail"];
            $subject="Book Place Confirmation";

            if ($ticket_type ==1) {
                $type = "Normal";
            }elseif($ticket_type ==2){
                $type = "Strander";
            }else{
                $type = "ViIP";
            }


			if($requereSeat>0){
				$sql = "SELECT MAX(ID) as orderID FROM `order`";
                $result = $con->query( $sql );
                if ( $result->num_rows > 0 ) {

                    foreach ( $result as $row ) {
                        $orderID=$row["orderID"];
                    }

                    if (is_null($orderID)) {
                        $orderID = 1;

                    }else{
                        $orderID+=1;
                    }
                    

                    $orderSQL = "INSERT INTO `order`(`ID`, `order_type`, `userID`, `payment_status`, `orderStatus`) VALUES ($orderID, 3, $userid, 1, 0)";
                    $con->query( $orderSQL );

                    //now booking
                    
                    $sql="UPDATE `customer_ticket` SET `order_id`=$orderID, `ticket_type`=$ticket_type,  `userID`=$userid, `role`=1 WHERE `fishingPlaceID`=$placeID AND `role`=0 LIMIT $requereSeat";

                    if($con->query($sql)){
                        $msg="your booking is ok";
                        
                        $sql1="SELECT COUNT(*) AS count FROM `customer_ticket` WHERE `fishingPlaceID`=$placeID AND `role`=0";
                        $result=$con->query($sql1);
                        if($result->num_rows>0){
                            foreach($result as $row){
                                $count=$row["count"];
                            }
                            
                        }
                        $sql2="UPDATE `fishingplace` SET `TotalSeat`=$count WHERE `ID`=$placeID";



                        if($con->query($sql2)){
                            $_SESSION["confirmMsg"]="your booking is confirmed. Please check email for confirmation.";

                            //send mail
                            $detail = "Your booking has been confirm. Your have successfully purchase $requereSeat $type ticket.";
                            sendmail($to, $subject, $detail);



                        }else{
                            $_SESSION["confirmMsg"]="ERROR";
                        }
                    }else{
                        $msg="error";
                    }
                }
					
			}else{
				
				$_SESSION["confirmMsg"]="Your required seat is 0 or not seat available";
			}
				echo($_SESSION["confirmMsg"]);
				header("location:Bookplace.php?id=$placeID"); 
			
        
    }else{

        $_SESSION["confirmMsg"]="Payment Unsuccessfull";

    }
}
?>



