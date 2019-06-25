 <?php
    include( "../header.php" );
    include( "../dbCon.php" );
    $con = connection();
 ?>

<?php
    $userid=$_SESSION["userid"];
    $sql="SELECT * FROM `user` WHERE `role`=0 AND `ID`=$userid";
    $result=$con->query($sql);
    if($result->num_rows>0){
    	foreach($result as $row){
    		$email=$row["email"];
    		$name=$row["name"];
    		$address=$row["address"];
    		$phone=$row["phone"];
    		$image=$row["image"];
    		//echo($email);
    	}
    }

?>


<div class="container" style="margin-top: 170px">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="container">
            <div class="row my-2">
                <form action="profileChecker.php?id=<?=$userid?>" method="post" enctype="multipart/form-data" >
                    <div class="col-lg-4 order-lg-1 text-center" style="border: 1px solid #ececec; padding: 10px;">
                       <?php
						if(isset($image)){
							 
						?>
                        <img src="../userImg/<?=$image?>" class="mx-auto img-fluid img-circle d-block" style="max-height: 150px;" alt="avatar">
                        <?php
						}else {
						
						?>
                       <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                     <?php }
                        ?>
                        <h6 class="mt-2">Upload a different photo</h6>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="fileToUpload">
                            <span class="custom-file-control">Choose file</span>
                        </label>
                    </div>
                    <div class="col-lg-8 order-lg-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                            </li>
                        </ul>
                        <div class="tab-content py-4">
                            <div class="tab-pane active" id="profile">
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input name="name" class="form-control" type="text" value="<?=$name?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input name="email" class="form-control" type="email" value="<?=$email?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input name="address" class="form-control" type="text" value="<?=$address?>"  >
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">phone</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" value="<?=$phone?>" name="phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="" name="pass">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="submit" class="btn btn-primary" value="Save Changes" name="Submit">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->