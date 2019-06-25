<?php include("../header.php"); ?>
<?php
if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"])&& $_SESSION["role"]==0)){
	?>
<script>
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>	
<?php
include("../dbCon.php");
		$con=connection();
if(isset($_POST["submit"])){
		
	
	$okFlag=TRUE;
	
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="please type your name.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["description"]) || ($_REQUEST["description"])==''){
			$message="please type your description.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST['buyPrice']) || ($_REQUEST['buyPrice'] == '')){
				$message .= 'Please type your buyPrice.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['hirePrice']) || ($_REQUEST['hirePrice'] == '')){
				$message .= 'Please type your hirePrice.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['catagory']) || ($_REQUEST['catagory'] == '')){
			$message .= 'Please Select catagory.<br>';
			$okFlag = FALSE;
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
			
	
	
	
	
	if($okFlag){

		$name=$_REQUEST["name"];
		$description=$_REQUEST["description"];
		$buyPrice=$_REQUEST["buyPrice"];
		$hirePrice=$_REQUEST["hirePrice"];
		$catagory_id=$_REQUEST["catagory"];
		$image=$newName;


		$sql="INSERT INTO `product`(`name`, `catagory_id`, `Description`, `img`, `buyPrice`, `hirePrice`) VALUES ('$name', $catagory_id,'$description','$image','$buyPrice','$hirePrice')";
		
		if($con->query($sql)){
			$_SESSION["msg"]="Successfully added product";
		}else{
			$_SESSION["msg"]="database error.";
		};
		
	}
	
	

	
}


?>

	<div style="background: #333; padding-top: 200px; padding-bottom: 50px;">
		<div class="container">
			<div class="row">
				<div style="color: aliceblue;" class="login-check">
					<div class="checkout-form" >

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


						<form action="" method="post" enctype="multipart/form-data">
							<div class="col-md-12 col-sm-12 col-xs-12 login-form">
								<h3 >Add kit</h3>
								<div class="billing-field">

									<div class="col-md-6 form-group">
										<label>Name</label>
										<input type="text" class="form-control" name="name"  required/>
									</div>

									<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control" name="fileToUpload" required />
									</div>

									<div class="col-md-6 form-group">
										<label>Buy price</label>
										<input type="number" class="form-control" name="buyPrice" required/>
									</div>

									<div class="col-md-6 form-group">
										<label>Hire price</label>
										<input type="number" class="form-control" name="hirePrice" required/>
									</div>
									<div class="col-md-12 form-group">
										<label>Type</label>
										<select class="form-control" name="catagory" required >

											<?php
											$sql2 = "SELECT * FROM `catagory`";
											$result1 = $con->query( $sql2 );
											if ( $result1->num_rows > 0 ) {
												foreach ( $result1 as $row ) {
													$Cat_name = $row[ "name" ];
													$Cat_ID = $row[ "ID" ];

													?>

												<option value="<?=$Cat_ID?>">
													<?=$Cat_name?>
												</option>
											<?php
												}
											//echo("Cat_name");
											}
											?>
										</select>
									</div>
									<div class="col-md-12 form-group">
										<div class="row">
											<div class="col-md-12">
												<label>Description </label>
											</div>
											<div class="col-md-12">
												<textarea name="description" required style=" height: 100px; width: 100%; color: black;"></textarea>
											</div>
										</div>
									</div>
							
								</div>
								<div>
									<input style="   min-width: 100px; margin-left: 45%;" class="btn btn-success" type="submit" value="Add" name="submit"/>
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

	include("../footer.php");
	?>
	<!-- Footer Section /- -->