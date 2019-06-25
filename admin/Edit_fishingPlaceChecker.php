 <?php include("../header.php"); ?>

 <?php
 include( "../dbCon.php" );
 $con = connection();

 

if(isset($_GET["ID"])){

	$ID=$_GET["ID"];

	if(isset($_POST["submit"])){

		$sql="SELECT * FROM `fishingplace` WHERE `ID`=$ID ";
		$result=$con->query($sql);
		if($result->num_rows>0){
			foreach($result as $row){
				$checkSeat=$row["TotalSeat"];
			}
		}
		
		// image upload
		$target_dir = "../img/";
		$newName=date('YmdHis_');
		$newName .=basename($_FILES["fileToUpload"]["name"]);
		$target_file = $target_dir.$newName;

		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				$message= "File is not an image.";
				$uploadOk = 0;
			}
		
		// Check if file already exists
		if (file_exists($target_file)) {
			$message = "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 200000000) {
			$message= "Sorry, your file is too large. upload image within 2MB";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$message = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				
			} else {
				$message = "Sorry, there was an error uploading your file.";
			}
		}
		
		
		
		$okFlag=TRUE;
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="please type  name.";
			$okFlag=FALSE;
		}if(!isset($_REQUEST["description"]) || $_REQUEST["description"]==''){
			$message="please type  description.";
			$okFlag=FALSE;
		}if(!isset($_REQUEST["seat"]) || $_REQUEST["seat"]==''){
			$message="please type  seat.";
			$okFlag=FALSE;
		}if(!isset($_REQUEST["Price"]) || $_REQUEST["Price"]==''){
			$message="please type  Price.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["location"]) || $_REQUEST["location"]==''){
				$message="please type  location.";
				$okFlag=FALSE;
		}if(!isset($_REQUEST["latitude"]) || $_REQUEST["latitude"]==''){
				$message="please type  latitude.";
				$okFlag=FALSE;
		}if(!isset($_REQUEST["longitude"]) || $_REQUEST["longitude"]==''){
				$message="please type  longitude.";
				$okFlag=FALSE;
		}if(!isset($_REQUEST["fromDate"]) || $_REQUEST["fromDate"]==''){
				$message="please type  From Date.";
				$okFlag=FALSE;
		}if(!isset($_REQUEST["toDate"]) || $_REQUEST["toDate"]==''){
				$message="please type  To Date.";
				$okFlag=FALSE;
		}
		
		
		$name=$_REQUEST["name"];
		$description=$_REQUEST["description"];
		$image=$newName;
		$new_totalseat=$_REQUEST["seat"];
		$price=$_REQUEST["Price"];
		$Location=$_REQUEST["location"];
		$latitude=$_REQUEST["latitude"];
		$longitude=$_REQUEST["longitude"];
		$fromDate=$_REQUEST["fromDate"];
		$toDate=$_REQUEST["toDate"];
		$qqq=$new_totalseat;
		$totalseat=$new_totalseat;
		
		if($okFlag==TRUE){
			$sql1="UPDATE `fishingplace` SET `name`='$name',`Description`='$description',`TotalSeat`=$new_totalseat,`price`=$price,`Location`='$Location',`latitude`=$latitude,`longitude`=$longitude,`image`='$image',`fromDate`='$fromDate',`toDate`='$toDate' WHERE `ID`=$ID";

			//echo $sql1;
			
			if($con->query($sql1)){
				$_SESSION["msg"]="Suessfully updated";
				
				if($checkSeat>$new_totalseat){
					$limit=$checkSeat-$new_totalseat;
					$sql2="DELETE FROM `customer_ticket` WHERE `fishingPlaceID`=$ID AND `role`=0 LIMIT $limit";
					
					if($con->query($sql2)){
						$_SESSION["msg"]="Suessfully deleted";
					}else{
					$_SESSION["msg"]="not available";
					}
				}
			
			if($checkSeat<$new_totalseat){
				$limit=$new_totalseat-$checkSeat;
				for($a=0;$a<$limit;$a++){
					$sql3="INSERT INTO `customer_ticket`(`fishingPlaceID`) VALUES ($ID)";
					$con->query($sql3);
					//echo("ok.<br>");
				}
			}
			$_SESSION["msg"]="Suessfully updated";
				
			}else{
				$_SESSION["msg"]="database error";
			}
		}
		  
		//echo($_SESSION["msg"]);
	}


	$sql="SELECT * FROM `fishingplace` WHERE `ID`=$ID ";
	$result=$con->query($sql);
	if($result->num_rows>0){
		foreach($result as $row){
			$id=$row["ID"];
			$name=$row["name"];
			$Description=$row["Description"];
			$totalseat=$row["TotalSeat"];
			$image=$row["image"];
			$price=$row["price"];
			$Location=$row["Location"];
			$latitude=$row["latitude"];
			$longitude=$row["longitude"];
			$fromDate=$row["fromDate"];
			$toDate=$row["toDate"];
			$checkSeat=$totalseat;
		}
	}
	

}

?>





<div style="background: #333; padding-top: 200px; padding-bottom: 50px;">
	<div class="container">
		<div class="row">
			<div style="color: aliceblue;">
				<div class="checkout-form">


					<?php if(isset($_SESSION["msg"])){ ?>
						<div class="alert alert-success" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Success!</strong> <?=$_SESSION["msg"]?>
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

					<form action="" method="post"  enctype="multipart/form-data">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h3 >Fising Place</h3>
							<div class="billing-field">
								<div class="col-md-6 form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name" value="<?=$name?>" required/>
								</div>
								<div class="col-md-6 form-group" style=" ">
									<label>Image</label>
									<input type="file" class="form-control" name="fileToUpload" required value="<?=$image?>"/>
								</div>
								<div class="col-md-12 form-group">
									<div class="row">
										<div class="col-md-12">
											<label>Description </label>
										</div>
										<div class="col-md-12">
											<textarea name="description" required style=" height: 100px; width: 100%; color: black;"><?=$Description?></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-6 form-group">
									<label>Total seat</label>
									<input type="number" class="form-control" name="seat" value="<?=$totalseat?>" required />
								</div>
								<div class="col-md-6 form-group">
									<label>Price</label>
									<input type="number" class="form-control" name="Price" value="<?=$price?>" required/>
								</div>
								<div class="col-md-6 form-group">
									<label>Location</label>
									<input type="text" class="form-control" name="location" required value="<?=$Location?>"/>
								</div>
								<div class="col-md-6 form-group">
									<label>Latitude</label>
									<input type="text" class="form-control" name="latitude" required value="<?=$latitude?>"/>
								</div><div class="col-md-6 form-group">
									<label>Longitude</label>
									<input type="text" class="form-control" name="longitude" required value="<?=$longitude?>"/>
								</div>
								<div class="col-md-6 form-group">
									<label>From Date</label>
									<input type="date" class="form-control" id="fromDate" name="fromDate" required value="<?=$fromDate?>"/>
								</div><div class="col-md-6 form-group">
									<label>To Date</label>
									<input type="date" class="form-control" id="toDate" name="toDate" required value="<?=$toDate?>"/>
								</div>
								
							</div>
							<div>
								<input style=" min-width: 100px; margin-left: 45%;" class="btn btn-success" type="submit" value="Update" name="submit"/>
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

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->


 <script>
setInterval(function() { ObserveInputValue($('#fromDate').val()); }, 100);

function ObserveInputValue(){

	if($('#fromDate').val() != ''){

		var formattedDate = new Date($('#fromDate').val());
		var d = formattedDate.getDate();
		d += 1;
		var m =  formattedDate.getMonth();
		m += 1;  // JavaScript months are 0-11
		var y = formattedDate.getFullYear();

		var mindate = y;

		if (m > 9) {
			mindate += "-" + m;
		}else{
			mindate += "-0" + m;
		}

		if (d > 9) {
			mindate += "-" + d;
		}else{
			mindate += "-0" + d;
		}


		$( "#toDate" ).prop('min', mindate);
   	}
	
}
</script>