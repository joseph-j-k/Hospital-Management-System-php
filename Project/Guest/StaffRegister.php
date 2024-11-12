<?php include("Head.php")?>

<?php include('../Assets/Connection/Connection.php') ?>

<?php 

if(isset($_POST["btn_submit"]))
{	

	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	$photo = $_FILES["photo"]["name"];
	$temp = $_FILES["photo"]["tmp_name"];
	 move_uploaded_file($temp,'../Assets/File/Staff/'.$photo);
	$password = $_POST["password"];
	$repassword = $_POST["repassword"];
	
	
	if($password == $repassword)
	{
		
		$insQry = "insert into tbl_staff(staff_name,staff_contact,staff_email,	staff_photo,staff_password)values('".$name."','".$contact."','".$email."','".$photo."','".$password."')";
		
		if($con -> query($insQry))
		{
			
			echo "<script>
			alert('Inserted');
			window.location = 'StaffRegister.php';
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
                         <img src="https://images.pexels.com/photos/8376277/pexels-photo-8376277.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="" enctype="multipart/form-data">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h3>#Join our care team</h3>
                                   <h2>Register today</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <label for="txt_name">Name</label>
                                        <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="Full Name" required autocomplete="off">
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
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo" required autocomplete="off">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required autocomplete="off"  pattern="[0-9a-zA-Z!@#$%^&*]{8,}">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="repassword">RePassword</label>
                                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Your RePassword" required autocomplete="off">
                                   </div>
                                   
                                   <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="form-control" id="cf-submit" name="btn_submit">Register</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>

<?php include("Foot.php")?>
