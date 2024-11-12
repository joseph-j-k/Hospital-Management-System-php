<?php include("Head.php")?>

<?php include('../Assets/Connection/Connection.php') ?>

<?php 

if(isset($_POST["btn_submit"]))
{	

	
	$name = $_POST["txt_name"];
	$email = $_POST["txt_email"];
	$photo = $_FILES["photo"]["name"];
	$temp = $_FILES["photo"]["tmp_name"];
	 move_uploaded_file($temp,'../Assets/File/Doctor/'.$photo);
	$contact = $_POST["txt_contact"];
	$password = $_POST["txt_password"];
	$repassword = $_POST["txt_repassword"];
	$qualification= $_POST["txt_qualification"];
	$experience= $_POST["txt_experience"];
	$address= $_POST["txt_address"];
	$department = $_POST["selDepartment"];

	
	if($password == $repassword)
	{
		
		$insQry = "insert into tbl_doctor(doctor_name,doctor_email,	doctor_photo,doctor_contact,doctor_password,doctor_qualification,doctor_experience,doctor_address,dept_id)values('".$name."','".$email."','".$photo."','".$contact."','".$password."','".$qualification."','".$experience."','".$address."','".$department."')";
		
		if($con -> query($insQry))
		{
			
			echo "<script>
			alert('Inserted');
			window.location = 'DoctorRegister.php';
				</script>";
			
			}
		
		}
	
	
	
	}


?>
<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="https://cdn.pixabay.com/photo/2017/05/23/17/12/doctor-2337835_1280.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="" enctype="multipart/form-data">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h4>#Together, we heal</h4>
                                   <h2>Register now</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_name">Name</label>
                                        <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder=" Your Full Name" required autocomplete="off">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="txt_email">Email</label>
                                        <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Your Email" required autocomplete="off">
                                   </div>


                                   <div class="col-md-6 col-sm-6">
                                        <label for="txt_contact">Contact</label>
                                        <input type="text" class="form-control" id="txt_contact" name="txt_contact" placeholder="Your Contact" required pattern="[0-9]{10,10}" autocomplete="off">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Select Department</label>
                                        <select class="form-control" name="selDepartment" id="selDepartment" required>
                                             <option>---Select---</option>
                                             <?php
                                              $sel = "select * from  tbl_department";
                                              $result = $con -> query($sel);
                                              while($data = $result -> fetch_assoc())
                                              {
                                              ?>
                                                <option value="<?php echo $data["dept_id"]?>"><?php echo $data["dept_name"]?></option>
                                                <?php } ?>
                                        </select>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="txt_qualification">Qualification</label>
                                        <input type="text" class="form-control" id="txt_qualification" name="txt_qualification" placeholder=" Your Qualification" required autocomplete="off">
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_experience">Experience</label>
                                        <textarea class="form-control" rows="5" id="txt_experience" name="txt_experience" placeholder="Your Experince" required autocomplete="off"></textarea>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_address">Address</label>
                                        <textarea class="form-control" rows="5" id="txt_address" name="txt_address" placeholder="Your Address" required autocomplete="off"></textarea>
                                   </div>


                                   <div class="col-md-6 col-sm-6">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo"  required autocomplete="off" >
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_password">Password</label>
                                        <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Your Password" required autocomplete="off"  pattern="[0-9a-zA-Z!@#$%^&*]{8,}">
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_repassword">RePassword</label>
                                        <input type="password" class="form-control" id="txt_repassword" name="txt_repassword" placeholder="Your RePassword" required autocomplete="off">
                                   </div>

                                   <div>
                                        <button type="submit" class="form-control" id="cf-submit" name="btn_submit">Register</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>


 <?php include("Foot.php")?>