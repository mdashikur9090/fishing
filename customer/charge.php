<?php
require_once "../vendor/autoload.php";
include("../dbCon.php");
include("../email.php");
    $con=connection();
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
 
if(!empty($_POST['token'])) {


    $userID     = $_SESSION["userid"];
    $productID  = $_POST["productId"];
    $qty        = $_POST["quantity"];


    $token = $_POST['token'];
    $email = $_POST['email'];
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


        if (count($productID)>0) {

            //echo "string";

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
                

                $orderSQL = "INSERT INTO `order`(`ID`, `userID`, `payment_status`, `orderStatus`) VALUES ($orderID, $userID, 1, 0)";
                $con->query( $orderSQL );

                //now store order item to buy product with this order id
                for($x=0;$x<count($productID);$x++){
                    // echo "product id: ".$productID[$x]."</br>";
                    // echo "quentity: ".$qty[$x]."</br>";
                    $orderItemSQL = "INSERT INTO `buyproduct`(`OrderID`, `ProductID`, `quantity`) VALUES ($orderID, $productID[$x], $qty[$x])";
                    $con->query( $orderItemSQL );

                }

                //now remove item form cart
                $delSQL="DELETE FROM `cart` WHERE `userID`=$userID AND hireId=0";
                $con->query( $delSQL );

                $_SESSION["confirmMsg"]="Order has been placed successfuly. please check your email for confirmation.";

                //send mail
                $to=$_SESSION["useremail"];
                $subject="Product Order Confirmation";
                $detail = "Your Product Order has been placed successfuly..";
                sendmail($to, $subject, $detail);
                

                //redirect
                header("location:cart.php");

            }

        }
 
        
    }else{

        $_SESSION["confirmMsg"]="Payment Unsuccessfull";

    }
}
?>