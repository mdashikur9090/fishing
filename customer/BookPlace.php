<?php 

	include("../header.php"); 
	include("../dbCon.php");
	$con=connection();

	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
?>
		<script>
			location.href="<?=$_SESSION["directory"]?>login.php";
		</script>
<?php } else { 

				if(isset($_GET["id"])){
					$id=$_GET["id"];
					$sql="SELECT * FROM `fishingplace` WHERE `ID`=$id";
					$result=$con->query($sql);
					if($result->num_rows>0){
						foreach($result as $row){ 
							$id=$row["ID"];
							$name=$row["name"];
							$TotalSeat=$row["TotalSeat"];
							$price=$row["price"];
							$location=$row["Location"];

						}
					}
				}

?>


					<div style="color: aliceblue;" class="login-check">
						<div class="checkout-form" >
							<form action="bookPlaceCheckout.php" method="post"  >
								<div class="col-md-7 col-sm-6 col-xs-6 login-form" style="margin-top: 200px; left: 20%;">
									<input type="hidden" name="id" value="<?=$id?>">
									<input type="hidden" name="price" value="<?=$price?>">

									<div>
								 		<?php if(isset($_SESSION["confirmMsg"])){ ?>

												<div class="alert alert-success" role="alert">
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												  <strong>Result!</strong> <?=$_SESSION["confirmMsg"]?>!
												</div>
												<script>
													window.setTimeout(function() {
													    $(".alert").fadeTo(5000, 0).slideUp(5000, function(){
													        $(this).remove(); 
													    });
													}, 4000);
												</script>
												
											<?php
												unset($_SESSION["confirmMsg"]);
												}
											
											?>
							 		</div>
							 	
									<h3 >Book your place</h3>
									<div class="billing-field">
										<div class="col-md-6 form-group">
											<label>Place Name</label>
											<input type="text" class="form-control" name="name" value="<?=$name?>"  readonly/>
										</div>
										
										<div class="col-md-6 form-group">
											<label>Total Seat Available</label>
											<input type="text" class="form-control" name="totalseat" value="<?=$TotalSeat?>" readonly/>
										</div>
										<div class="col-md-6 form-group">
											<label>Price/Seat</label>
											<input id="price" type="number" class="form-control" name="price" value="<?=$price?>" readonly/>
										</div>
										<div class="col-md-6 form-group">
											<label>Required seat *</label>
											 <input type="number" class="form-control" name="requiredSeat"  required max="<?=$TotalSeat?>" min="0"/>
										</div>
										<div class="col-md-6 form-group">
											<label>Ticket catagory *</label>
											<select name="ticket_type" required class="form-control" id="sel1" style="color: black">
												<option value="1">Normal</option>
												<option value="2">Standard</option>
												<option value="3">VIP</option>
											</select>
										</div>
										<div class="col-md-6 form-group" class="form-control">
											<label>Location</label>
											<input type="text" class="form-control" name="location" value="<?=$location?>" readonly/>
										</div>
										<div class="col-md-12 form-group" class="form-control">
											<label>Facilities</label>
											<textarea id="facilities" maxlength="300" class="form-control" readonly>Time-2 hours, place-normal</textarea>
										</div>
									</div>
									<div>
										<input style="   min-width: 100px; margin-left: 45%;" class="btn btn-success" type="submit" value="Book" name="submit"/>
									</div>
								</div>
							</form>
						</div>
					</div>




<!-- Footer Section -->
<?php
			include("../footer.php");

			}
?>
<!-- Footer Section /- -->
		
	


<script>
	$("#sel1").on('change',function(){
		if(this.value=="1"){
			var price=<?=$price?>;
			$("#price").val(price);
			$("#facilities").val("Time-2 hours, place-normal");
		}else if(this.value=="2"){
			var price=<?=$price?>;
			$("#price").val(price*1.5);
			$("#facilities").val("Time-3 hours, place-normal");
		}else if(this.value=="3"){
			var price=<?=$price?>;
			$("#price").val(price*2);
			$("#facilities").val("Time-5 hours, place-Under Tree (inculding 1 helping person for you.)");
		}
		
	});

</script>





