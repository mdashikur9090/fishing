<?php include("header.php") ?>



<div style="color: aliceblue; ">
	<div class="col-md-12 col-sm-12 col-xs-12 login-block" style="margin-top: 200px;margin-bottom: 200px; left: 20%;" >
		<div>
			<label style="color: red"> <?php if(isset($_SESSION["wrong"])){echo($_SESSION["wrong"]); unset($_SESSION["wrong"]);} ?> </label><br>
			<label style="color: red;"><?php if(isset($_SESSION["loginChk"]) && ($_SESSION["loginChk"]>=3)){
			echo("You have try ".$_SESSION["loginChk"]." times already and cannot try more than 5 time. So only ".(5-$_SESSION["loginChk"])." times you can try to login.<br>");}
				if(isset($_SESSION["loginChk"]) && ($_SESSION["loginChk"]>=5)){echo("Please restart your browser");}
 			?></label><br>
		</div>
		<div class="login-check">
			<h3>Your Contact Email</h3>
			<div class="col-md-7 col-sm-6 col-xs-6 login-form">
				<form action="loginchecker.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email *" name="name" required/>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password *" name="pass"  required/>
					</div>

					<div class="row">
						<div class="col-md-4">
							<input class="btn btn-success" type="submit" value="SIGN IN" name="Submit" <?php if(isset($_SESSION["loginChk"]) && ($_SESSION["loginChk"]>=5)){ ?>disabled <?php } ?> />
						</div>
						<div class="col-md-4">
							<a href="#" title="Forgot Password?">Forgot Password?</a>
						</div>
						<div class="col-md-4">
							<a href="registration.php">Create An Account</a>
						</div>
					</div>



					
					
				</form>
				<div class="" >
					
					
				</div>
			</div>
			<div class="form-group">								
				
			 
			</div>
		</div>
	</div>
	
</div>































<?php include("footer.php") ?>