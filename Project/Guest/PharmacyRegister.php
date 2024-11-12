<?php include("Head.php")?>
<?php include('../Assets/Connection/Connection.php') ?>

<?php 

if(isset($_POST["btn_submit"]))
{	

	
     $name = $_POST["txt_name"];
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	$repassword = $_POST["txt_repassword"];
	
	
	if($password == $repassword)
	{
		
		$insQry = "insert into tbl_pharmacy(pharmacy_name, pharmacy_email,pharmacy_password)values('".$name."', '".$email."','".$password."')";
		
		if($con -> query($insQry))
		{
			
			echo "<script>
			alert('Inserted');
			window.location = 'PharmacyRegister.php';
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
                         <img src="https://images.pexels.com/photos/4131792/pexels-photo-4131792.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="" enctype="multipart/form-data">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h3>#Right at your pharmacy doorstep</h3>
                                   <h2>Register today</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                              <div class="col-md-12 col-sm-12">
                                        <label for="txt_email">Name</label>
                                        <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="Your Name" required autocomplete="off">
                                   </div>
                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_email">Email</label>
                                        <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Your Email" required autocomplete="off">
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_password">Password</label>
                                        <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Your Password" required autocomplete="off"  pattern="[0-9a-zA-Z!@#$%^&*]{8,}">
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="txt_repassword">RePassword</label>
                                        <input type="password" class="form-control" id="txt_repassword" name="txt_repassword" placeholder="Your RePassword" required autocomplete="off">
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