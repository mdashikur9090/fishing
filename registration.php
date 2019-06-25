
<?php include("header.php"); ?>


 
<?php
	$name="";
	$email="";
	$pass="";
	$phone="";
	$address="";
	$Insert="";
	$Conform_pass="";
	$matchPass="";
	$msgg="";
	$message="";
	$okFlag=TRUE;

	if($_POST){
		
		include("dbCon.php");
		$con=connection();

	 
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="please type your name.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["email"]) || ($_REQUEST["email"])==''){
			$message="please type your email.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST['address']) || ($_REQUEST['address'] == '')){
				$message .= 'Please type your address.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['phone']) || ($_REQUEST['phone'] == '')){
				$message .= 'Please type your phone number.<br>';
				$okFlag = FALSE;
			}if(!isset($_REQUEST['pass']) || ($_REQUEST['pass'] == '')){
				$message .= 'Please type your password.<br>';
				$okFlag = FALSE;
			}
		if(isset($_REQUEST["R_pass"]) && (isset($_POST["R_pass"]))){
			
			if($_POST["pass"] != $_POST["R_pass"]){
				$message="password dont match.";
				$okFlag=FALSE;
			}
			
		}
	
	if($okFlag){
		$name=$_REQUEST["name"];
		$email=$_REQUEST["email"];
		$address=$_REQUEST["address"];
		$phone=$_REQUEST["phone"];
		$pass=md5($_REQUEST["pass"]);
		$Conform_pass=md5($_REQUEST["R_pass"]);
		$sql="SELECT * FROM `user` WHERE `email`='$email' ";
		$result = $con->query($sql);
		if($result->num_rows <= 0){
			$sql1 = "INSERT INTO user (name, email, password,address,phone)
			VALUES ('$name', '$email', '$pass','$address','$phone')";
			
			if($con->query($sql1)){
				$_SESSION["msg"]=("registration Successfully done");
				//header('location:signup.php?msg=Successfully Registered');
			}else{
				$_SESSION["msg"]=("database error");
				//header('location:signup.php?msg=Successfully Registered');
				}
		}
		else{
			$_SESSION["msg"]=("Your email already exits");
			//header('location:signup.php?msg=Successfully Registered');
			}
		}
		else{
			 $_SESSION["msg"]=$message;
			}    


	
	}
 
?>




 
<div style="background: #333; padding-top: 200px; padding-bottom: 50px;">
	<div class="container">
		<div class="row">
			<div style="color: aliceblue;">
				<div class="checkout-form" >
					<form action="" method="post" >
						<div class="col-md-12 col-sm-12 col-xs-12">

							<?php if(isset($_SESSION["msg"])){ ?>
								<div class="alert alert-success" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong><?=$_SESSION["msg"]?></strong>
								</div>
								<script>
									window.setTimeout(function() {
									    $(".alert").fadeTo(500, 0).slideUp(500, function(){
									        $(this).remove(); 
									    });
									}, 4000);
								</script>
								
							<?php
								unset($_SESSION["msg"]);
								}
							
							?>

							<h3>Registration Form</h3>
							<div class="billing-field">
								<div class="col-md-6 form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name"  required/>
								</div>
								<div class="col-md-6 form-group">
									<label>Email Address </label>
									<input type="email" class="form-control" name="email" required/>
								</div>
								<div class="col-md-6 form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="pass" required/>
								</div>
								
								<div class="col-md-6 form-group">
									<label>Repeat Password</label>
									<input type="password" class="form-control" name="R_pass" required/>
								</div>
								
								<div class="col-md-12 form-group">
									<label>Address</label>
									<input type="text" class="form-control" placeholder=" Address" name="address"/ required>
								</div>
							
								<div class="col-md-12 form-group">
									<label>Town / City</label>
									<input type="text" class="form-control" name="city"/>
								</div>
							
								<div class="col-md-6 form-group">
									<label>Pincode/Zip </label>
									<input type="number" class="form-control" />
								</div>
								
								<div class="col-md-6 form-group">
									<label>Phone Number</label>
									<input type="text" class="form-control" name="phone"/ required>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<input class="btn btn-success" type="submit" value="SIGN UP" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

			

<!-- Footer Section -->
<?php

include("footer.php");
?>
<!-- Footer Section /- -->
			
 
